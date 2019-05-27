import React from 'react'
import CardHeader from "../components/card/CardHeader";
import Card from "../components/card/Card";
import ApiClient from '../ApiClient'

class VoterResultsPage extends React.Component {
    state = {
        results: [],
    }
    render() {
        return (
            <>
                <div style={{ flex: '0.2', }}/>
                <Card style={{ background: 'transparent', 'box-shadow': 'none' }}>
                    <CardHeader style={{'width': '550px', 'maxWidth': '550px', 'margin-left': '-110px', 'height': '100px'}}>
                        <h1>Top 5 politici</h1>
                    </CardHeader>
                        {this.state.results.map(candidate =>
                                <div>
                                    <Card style={{'width': '550px', 'maxWidth': '550px', 'margin-left': '-100px'}}>
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
                {/*@NOTE:*/}
                {/*    This somehow makes the page looks fine?*/}
                {/* */}
                <div style={{ flex: '2' }}/>
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
        console.log(this.state)
    }
}

export default VoterResultsPage
