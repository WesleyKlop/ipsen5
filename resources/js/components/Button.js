import React from 'react'
import classnames from 'classnames'

const Button = ({className, ...props}) => (
    <button className={classnames(className, "button")} {...props}/>
)

export default Button
