import React from 'react'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import VoterMainPage from '../routes/VoterMainPage'
import InfoPage from '../routes/InfoPage'
import PropositionPage from '../routes/PropositionPage'
import FeedbackPage from '../routes/FeedbackPage'
import VoterResultsPage from '../routes/VoterResultsPage'
import EmailPage from '../routes/EmailPage'
import Header from '../components/Header'
import CandidateMainPage from '../routes/CandidateMainPage'
import PageNotFoundPage from '../routes/PageNotFoundPage'
import PrivateRoute from '../components/PrivateRoute'


const App = () => (
    <>
        <Header/>
        <BrowserRouter>
            <Switch>
                <PrivateRoute path="/info" component={InfoPage}/>
                <Route path="/candidate/:loginCode" component={CandidateMainPage}/>
                <PrivateRoute path="/proposition/:propositionId" component={PropositionPage}/>
                <PrivateRoute path="/feedback" component={FeedbackPage}/>
                <PrivateRoute path="/results" component={VoterResultsPage}/>
                <PrivateRoute path="/email" component={EmailPage}/>
                <Route path="/" exact component={VoterMainPage}/>
                <Route component={PageNotFoundPage} status={404}/>
            </Switch>
        </BrowserRouter>
    </>
)

export default App
