import React from 'react'
import classnames from 'classnames'
import CardHeaderMessage from './CardHeaderMessage'

const CardHeader = ({ message, className, onMessageClose, ...props }) => (
    <>
        <CardHeaderMessage message={message} onClose={onMessageClose}/>
        <div className={classnames(className, 'header')} {...props} />
        <div className={classnames(className, 'triangle')}/>
    </>
)

export default CardHeader
