import React from 'react'
import classnames from 'classnames'

const CardBody = ({ className, flex, height = 0, ...props }) => (
  <div
    className={classnames(className, 'body', { flex })}
    {...props}
    style={{ minHeight: height }}
  />
)

export default CardBody
