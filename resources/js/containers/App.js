import React from 'react'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from '../components/Header'
import PrivateRoute from '../components/PrivateRoute'
import CandidateMainPage from '../routes/CandidateMainPage'
import CandidateProfilePage from '../routes/CandidateProfilePage'
import EmailPage from '../routes/EmailPage'
import FeedbackPage from '../routes/FeedbackPage'
import InfoPage from '../routes/InfoPage'
import PageNotFoundPage from '../routes/PageNotFoundPage'
import PropositionPage from '../routes/PropositionPage'
import VoterMainPage from '../routes/VoterMainPage'
import Results from './Results'

const App = () => {
  return (
    <>
      <Header />
      <BrowserRouter>
        <Switch>
          <PrivateRoute path="/info" component={InfoPage} />
          <PrivateRoute path="/profile" component={CandidateProfilePage} />
          <PrivateRoute path="/proposition" component={PropositionPage} />
          <PrivateRoute path="/feedback" component={FeedbackPage} />
          <PrivateRoute path="/results" component={Results} />
          <PrivateRoute path="/email" component={EmailPage} />
          <Route path="/candidate/:loginCode" component={CandidateMainPage} />
          <Route path="/" exact component={VoterMainPage} />
          <Route component={PageNotFoundPage} status={404} />
        </Switch>
      </BrowserRouter>
    </>
  )
}

export default App
