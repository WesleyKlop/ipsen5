import React, { useState } from 'react'
import classnames from 'classnames'

const Input = ({ onChange, ...props }) => {
    const [dirty, setDirty] = useState(false)
    const onValueChange = e => {
        setDirty(e.currentTarget.value !== '')
        onChange(e)
    }
    return (
        <div className="input__wrapper">
            <input className={classnames('input', { dirty })} {...props} onChange={onValueChange}/>
            <div className="input__underline"/>
        </div>
    )
}

export default Input
