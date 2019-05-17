import React from 'react'

const CodeInput = ({ value, onChange }) => (
    <div className="input__wrapper">
        <input className="input" type="tel" pattern="[0-9]{6}" required autoComplete="off" placeholder="Je code" value={value} onChange={onChange}/>
        <div className="input__underline"/>
    </div>
)

export default CodeInput
