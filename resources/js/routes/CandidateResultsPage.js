import React from 'react'
import CardHeader from '../components/card/CardHeader'
import Card from '../components/card/Card'
import ApiClient from '../ApiClient'
import Spacer from '../components/Spacer'
import LinkButton from '../components/LinkButton'
import ResultCard from '../components/ResultCard'

class CandidateResultsPage extends React.Component {
  state = {
    results: [],
  }

  render() {
    return (
      <>
        <Spacer />
        <Card style={{ background: 'transparent', boxShadow: 'none' }}>
          <CardHeader>
            <h1>Resultaten</h1>
          </CardHeader>
          {this.state.results.map(result => (
            <div key={result.id}>
              <span>{result.name}</span>
              {result.propositions.map(proposition => (
                <ResultCard
                  key={proposition.id}
                  proposition={proposition.proposition}
                  answer={proposition.answers[0].answer}
                />
              ))}
            </div>
          ))}
        </Card>
        <LinkButton to={'/email'}>Resultaten E-mailen</LinkButton>
        <br />
        <LinkButton to={'/profile'}>Profiel aanpassen</LinkButton>
        <Spacer />
      </>
    )
  }

  componentDidMount() {
    ApiClient.request('answer')
      .then(result => this.setResults(result))
      .catch(error => console.error(error))
  }

  setResults = results => {
    this.setState({
      results,
    })
  }
}

export default CandidateResultsPage
