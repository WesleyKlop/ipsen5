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
                    <CardHeader>
                        Top 5 politici
                    </CardHeader>
                        <h2 style={{color: '#522871'}}>
                            {this.state.results.map(candidate =>
                                <div>
                                    <Card>
                                        {/*<div style = {{align: "left"}}>*/}
                                        {/*    <img src = {candidate.image} width = "150" height = "100"></img>*/}
                                        {/*</div>*/}
                                        <div style={{'text-align': 'center'}}>

                                            <img src = {candidate.image} width = "150" height = "100"></img>
                                            <p>{candidate.profile.first_name}</p>
                                            <p style={{color: '#522871'}}>{candidate.percentage} %</p>
                                            <p>{candidate.profile.function}</p>
                                        </div>
                                    </Card>
                                    <br></br>
                                </div>
                            )}
                        </h2>

                </Card>
                <div style={{ flex: '2' }}/>
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
