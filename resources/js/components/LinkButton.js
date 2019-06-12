import React from 'react'
import { Link } from 'react-router-dom'
import Button from './Button'
import classnames from 'classnames'

const LinkButton = ({ to, block, children, ...props }) => (
  <Link to={to} className={classnames(props.className, { block })} {...props}>
    <Button block={block}>{children}</Button>
  </Link>
)

export default LinkButton
