import React from 'react'
import classnames from 'classnames'

const Card = ({ className, ...props }) => (
    <div className={classnames(className, 'card')} {...props} />
)

export default Card
