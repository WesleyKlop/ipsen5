import React from 'react'
import { Link } from 'react-router-dom'
import Button from './Button'

const LinkButton = ({ to, buttonClassName, linkClassName, children, ...props }) => (
    <Link to={to} className={linkClassName} {...props}>
        <Button className={buttonClassName}>{children}</Button>
    </Link>
)

export default LinkButton
