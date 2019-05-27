import React, { useState } from 'react'
import classnames from 'classnames'

const EmailInput = ({ value, onChange }) => {
    const [dirty, setDirty] = useState(false)
    const onValueChange = e => {
        setDirty(e.currentTarget.value !== '')
        onChange(e)
    }
    return (
        <div className="input__wrapper">
            <input className={classnames('input', { dirty })} type="email" placeholder="Je E-mailadres" value={value} onChange={onValueChange}/>
            <div className="input__underline"/>
        </div>
    )
}

export default EmailInput
