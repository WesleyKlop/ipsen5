import React, { useState } from 'react'
import classnames from 'classnames'

const TextArea = ({ onChange, className, ...props }) => {
  const [dirty, setDirty] = useState(false)
  const onValueChange = e => {
    setDirty(e.currentTarget.value !== '')
    if (typeof onChange !== 'undefined') {
      onChange(e)
    }
  }
  return (
    <div className={classnames('input__wrapper', className)}>
      <textarea
        className={classnames('textarea', { dirty })}
        {...props}
        onChange={onValueChange}
      />
      <div className="input__underline" />
    </div>
  )
}

export default TextArea
