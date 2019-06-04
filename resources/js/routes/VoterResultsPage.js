import React from 'react'
import CardHeader from "../components/card/CardHeader";
import Card from "../components/card/Card";
import ApiClient from '../ApiClient'
import Spacer from "../components/Spacer";

class VoterResultsPage extends React.Component {
    state = {
        results: [],
    }

    render() {
        return (
            <>
                <Spacer/>
                <Card style={{background: 'transparent', boxShadow: 'none'}}>
                    <CardHeader>
                        <h1>Top 5 politici</h1>
                    </CardHeader>
                    {this.state.results.map(candidate =>
                        <div>
                            <Card>
                                <div className="voter-result-page__container">
                                    <div className="voter-result-page__picture"
                                         style={{backgroundImage: 'URL(' + candidate.image + ')'}}/>
                                    <span className="voter-result-page__name">
                                        {candidate.profile.first_name} {candidate.profile.last_name}
                                    </span>
                                    <span className="voter-result-page__percentage">{candidate.percentage} %</span>
                                    <span className="voter-result-page__function"> {candidate.profile.function} {candidate.profile.party}</span>
                                </div>
                            </Card>
                            <br/>
                        </div>
                    )}
                </Card>
                <Spacer/>
            </>
        )
    }

    componentDidMount() {
        ApiClient.request('voter/results')
            .then(result => this.setResults(result))
            .catch(error => console.log(error));
    }

    setResults = (results) => {
        this.setState({
            results
        });
    }
}

export default VoterResultsPage
