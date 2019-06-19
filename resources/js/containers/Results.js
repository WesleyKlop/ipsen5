import React, { useEffect, useState } from 'react'
import VoterResultsPage from '../routes/VoterResultsPage'
import CandidateResultsPage from '../routes/CandidateResultsPage'
import Auth from '../Auth'

const Results = () => {
  const [role, setRole] = useState(null)

  useEffect(() => {
    setRole(Auth.getRole())
  }, [])

  return role === 'voter' ? <VoterResultsPage /> : <CandidateResultsPage />
}

export default Results
