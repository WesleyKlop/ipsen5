import React, { useEffect, useState } from 'react'
import ApiClient from '../ApiClient'
import ProgressBar from '../components/ProgressBar'
import Proposition from '../components/Proposition'
import Spacer from '../components/Spacer'
import Spinner from '../components/Spinner'

const PropositionPage = ({ history }) => {
  const [isLoaded, setIsLoaded] = useState(false)
  const [propositions, setPropositions] = useState([])
  const [survey, setSurvey] = useState('')
  const [answers, setAnswers] = useState([])

  useEffect(() => {
    ApiClient.request('survey').then(({ name, propositions }) => {
      setSurvey(name)
      setPropositions(propositions)
      setIsLoaded(true)
    })
  }, [])

  useEffect(() => {
    if (answers.length === propositions.length && isLoaded) {
      ApiClient.request('answer', 'POST', answers)
        .then(() => history.push('/feedback'))
        .catch(() => history.push('/feedback'))
    }
  }, [answers])

  const progress = Math.max(
    (answers.length / propositions.length) * 100 + 10,
    0,
  )
  const handleChoose = ({ target }) => {
    const answer = target.value === 'true'
    setAnswers(
      answers.concat([
        {
          proposition_id: propositions[answers.length].id,
          answer,
        },
      ]),
    )
  }

  return (
    <>
      <Spacer />
      {isLoaded && answers.length !== propositions.length ? (
        <Proposition
          onChoose={handleChoose}
          proposition={propositions[answers.length].proposition}
          survey={survey}
        />
      ) : (
        <Spinner />
      )}
      <Spacer size={2} />
      <ProgressBar progress={progress} />
    </>
  )
}

export default PropositionPage
