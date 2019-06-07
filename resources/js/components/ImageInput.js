import React, { useRef, useState } from 'react'
import classnames from 'classnames'

const ImageInput = ({
  placeholderUrl = null,
  required = false,
  name,
  className,
}) => {
  const fileInput = useRef(null)
  const [image, setImage] = useState(null)
  const url = image
    ? URL.createObjectURL(fileInput.current.files[0])
    : placeholderUrl || '/images/profile-placeholder.svg'

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
      <img
        src={url}
        alt="Profile picture"
        onClick={() => fileInput.current.click()}
        className={classnames('image-input', className)}
      />
    </>
  )
}

export default ImageInput
