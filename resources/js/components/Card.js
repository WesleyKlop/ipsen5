import React from 'react'

const Card = () => (
    <div className="card">
        <div className="header">
            <h1 className="title">{CardTitle}</h1>
        </div>
        <div className="body">
            {cardBody}
        </div>
        <div className="buttons">
            {buttons}
        </div>
    </div>
)

export default Card
