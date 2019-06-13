import React from 'react'
import CardHeader from '../components/card/CardHeader'
import Card from '../components/card/Card'
import ApiClient from '../ApiClient'
import Spacer from '../components/Spacer'
import LinkButton from '../components/LinkButton'
import CandidateCard from '../components/CandidateCard'

class VoterResultsPage extends React.Component {
  state = {
    results: [],
  }

  render() {
    const { results } = this.state
    return (
      <>
        <Spacer />
        <Card style={{ background: 'transparent', boxShadow: 'none' }}>
          <CardHeader>
            <h1>Top {results.length} politici</h1>
          </CardHeader>
          {results.map(candidate => (
            <CandidateCard key={candidate.candidate_id} {...candidate} />
          ))}
        </Card>
        <LinkButton to={'/email'}>Resultaten E-mailen</LinkButton>
        <Spacer />
      </>
    )
  }

  componentDidMount() {
    ApiClient.request('voter/results')
      .then(result => this.setResults(result))
      .catch(error => console.error(error))
  }

  setResults = results => {
    this.setState({
      results,
    })
  }
}

export default VoterResultsPage
