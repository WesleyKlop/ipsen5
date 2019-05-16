import React from 'react'
import classnames from 'classnames'

const ProgressBar = ({ progress = 70, className, style }) => (
    <div className={classnames('progress-bar', className)} style={{
        ...style,
        background: `linear-gradient(
          to right,
          var(--second-house-color) ${Math.max(progress - 5, 0)}%,
          var(--accent-color) ${Math.min(progress + 5, 100)}%
        )`,
    }}/>
)

export default ProgressBar
