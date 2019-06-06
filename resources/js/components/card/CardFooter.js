import React from 'react'
import classnames from 'classnames'

const CardFooter = ({ className, ...props }) => (
    <div className={classnames(className, 'footer')} {...props} />
)

export default CardFooter
