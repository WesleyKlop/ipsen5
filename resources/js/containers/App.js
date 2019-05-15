import React from 'react'
import {BrowserRouter, Route, Switch} from 'react-router-dom'
import VoterMainPage from '../routes/VoterMainPage'
import InfoPage from '../routes/InfoPage'
import PropositionPage from '../routes/PropositionPage'
import FeedbackPage from '../routes/FeedbackPage'
import VoterResultsPage from '../routes/VoterResultsPage'
import EmailPage from '../routes/EmailPage'
import Header from '../components/Header'

const App = () => (
    <>
        <Header/>
        <div style={{flex: "1"}} />
        <BrowserRouter>
            <Switch>
                <Route path="/info" component={InfoPage}/>
                {/*<Route path="/thank-you" component={CandidateThankYouPage} />*/}
                <Route path="/proposition/:propositionId" component={PropositionPage}/>
                <Route path="/feedback" component={FeedbackPage}/>
                <Route path="/results" component={VoterResultsPage}/>
                <Route path="/email" component={EmailPage}/>
                <Route path="/" exact component={VoterMainPage}/>
            </Switch>
        </BrowserRouter>
        <div style={{flex: "2"}} />
    </>
)

export default App
