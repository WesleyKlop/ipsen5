import React from 'react'
import classnames from 'classnames'

const Button = ({ className, success, ...props }) => (
    <button className={classnames(className, 'button', { success })} {...props} />
)

export default Button
