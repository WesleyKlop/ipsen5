import React from 'react'
import Input from './Input'

const CodeInput = ({ value, onChange }) => (
  <Input
    type="tel"
    pattern="[0-9]{6}"
    maxLength="6"
    required
    autoComplete="off"
    placeholder="Je code"
    value={value}
    onChange={onChange}
  />
)

export default CodeInput
