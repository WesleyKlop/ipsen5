import React from 'react'
import Auth from "../Auth";
import CardHeader from "../components/card/CardHeader";

import Card from "../components/card/Card";
import CardBody from '../components/card/CardBody'
class VoterResultsPage extends React.Component {
    state = {
        results: [],
    }
    render() {
        return (
            <>
                <div style={{ flex: '0.2', }}/>
                <Card style={{ background: 'transparent', 'box-shadow': 'none' }}>
                    <CardHeader style={{'width': '550px', 'maxWidth': '550px', 'margin-left': '-110px'}}>
                        Top 5 politici
                    </CardHeader>
                        {this.state.results.map(candidate =>
                                <div>
                                    <Card style={{'maxWidth': '550px', 'margin-left': '-100px'}}>
                                        <div className="voter-result-page__container">

                                            <img src = {candidate.image} className="voter-result-page__pf" ></img>
                                            <p className="voter-result-page__fn">{candidate.profile.first_name}</p>
                                            <p className="voter-result-page__ln">{candidate.profile.last_name}</p>
                                            <p className="voter-result-page__prc">{candidate.percentage} %</p>
                                            <p className="voter-result-page__fnc"> {candidate.profile.function}</p>
                                        </div>
                                    </Card>
                                    <br></br>
                                </div>
                            )}

                </Card>
                {/*<div style={{ flex: '2' }}/>*/}
            </>
        )
    }

    componentDidMount() {
        fetch('/api/voter/results', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + Auth.getJWT(),
            },
        })
            .then(result => result.ok ? result.json() : Promise.reject('couldnt fetch'))
            .then(result => this.setResults(result))
            .catch(error => console.log(error));
    }

    setResults = (results) => {
        this.setState({
            results
        });
        console.log(this.state)
    }
}

export default VoterResultsPage
