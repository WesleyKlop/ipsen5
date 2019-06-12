import React from 'react'
import classnames from 'classnames'

const Button = ({ className, success, block, ...props }) => (
  <button
    className={classnames(className, 'button', { success, block })}
    {...props}
  />
)

export default Button
