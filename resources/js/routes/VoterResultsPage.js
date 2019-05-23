import React from 'react'
import Auth from "../Auth";
import CardHeader from "../components/card/CardHeader";

import Card from "../components/card/Card";
import CardBody from '../components/card/CardBody'
class VoterResultsPage extends React.Component {
    state = {
        results: []
    }
    render() {
        return (
            <>
                <div style={{ flex: '0.2', }}/>
                <Card style={{ background: 'transparent', 'box-shadow': 'none' }}>
                    <CardHeader>
                        Top 5 politici
                    </CardHeader>
                        <h2 style={{color: '#522871', 'text-align': "center"}}>
                            {this.state.results.map(a => <Card>{a.matched}</Card>)}
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
