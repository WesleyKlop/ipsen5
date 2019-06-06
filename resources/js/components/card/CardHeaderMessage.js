import React from 'react'
import classnames from 'classnames'

const CardHeaderMessage = ({ message, onClose }) => (
    <div className={classnames('header-message', { visible: !!message })}>
        <span className="header-message__message">{message}</span>
        <button className="header-message__close" onClick={onClose}>
            ✕
        </button>
    </div>
)

export default CardHeaderMessage
