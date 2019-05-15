import React from 'react'
import classnames from "classnames";

const CardButtons = ({className, ...props}) => (
    <div className={classnames(className, "buttons")} {...props}/>
)

export default CardButtons
