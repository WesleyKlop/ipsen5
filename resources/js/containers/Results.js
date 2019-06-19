import React, { useEffect, useState } from 'react'
import VoterResultsPage from '../routes/VoterResultsPage'
import CandidateResultsPage from '../routes/CandidateResultsPage'
import Auth from '../Auth'

const Results = () => {
  const [role, setRole] = useState(null)

  useEffect(() => {
    setRole(Auth.getRole())
  }, [role])

  switch (role) {
    case 'voter':
      return <VoterResultsPage />
    case 'candidate':
      return <CandidateResultsPage />
    default:
      return null
  }
}

export default Results
