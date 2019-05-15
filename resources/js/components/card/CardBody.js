import React from 'react'
import classnames from 'classnames'

const CardBody = ({className, ...props}) => (
    <div className={classnames(className, "body")} {...props}/>
)

export default CardBody
