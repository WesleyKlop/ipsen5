import React from 'react'
import classnames from 'classnames'

const CardHeader = ({className, ...props}) => (
    <>
        <div className={classnames(className, "header")} {...props}/>
        <div className={classnames(className, "triangle")}/>
    </>
)

export default CardHeader
