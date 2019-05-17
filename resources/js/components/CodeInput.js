import React, { useState } from 'react'
import classnames from 'classnames'

const CodeInput = ({ value, onChange }) => {
    const [dirty, setDirty] = useState(false)
    const onValueChange = e => {
        setDirty(e.currentTarget.value !== '')
        onChange(e)
    }
    return (
        <div className="input__wrapper">
            <input className={classnames('input', { dirty })} type="tel" pattern="[0-9]{6}" required autoComplete="off" placeholder="Je code" value={value} onChange={onValueChange}/>
            <div className="input__underline"/>
        </div>
    )
}

export default CodeInput
