import React, { useState } from 'react'
import classnames from 'classnames'

const Input = ({ onChange, className, ...props }) => {
    const [dirty, setDirty] = useState(false)
    const onValueChange = e => {
        setDirty(e.currentTarget.value !== '')
        if (typeof onChange !== 'undefined') {
            onChange(e)
        }
    }
    return (
        <div className={classnames('input__wrapper', className)}>
            <input
                className={classnames('input', { dirty })}
                {...props}
                onChange={onValueChange}
            />
            <div className="input__underline"/>
        </div>
    )
}

export default Input
