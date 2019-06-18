import classnames from 'classnames'
import React, { useEffect, useRef, useState } from 'react'

const ImageInput = ({ required = false, name, className, previewUrl }) => {
  const fileInput = useRef(null)
  const [image, setImage] = useState(null)
  const [preview, setPreview] = useState(previewUrl)

  useEffect(() => {
    if (fileInput.current.files.length === 1) {
      URL.revokeObjectURL(previewUrl)
      setPreview(URL.createObjectURL(fileInput.current.files[0]))
    } else {
      setPreview(previewUrl || '/images/profile-placeholder.svg')
    }
  }, [image, previewUrl])

  return (
    <>
      <input
        ref={fileInput}
        hidden
        type="file"
        accept="image/*"
        onChange={e => setImage(e.currentTarget.value)}
        required={required}
        name={name}
      />
      <div
        style={{ backgroundImage: `URL(${preview})` }}
        onClick={() => fileInput.current.click()}
        className={classnames('image-input', className)}
      />
    </>
  )
}

export default ImageInput
