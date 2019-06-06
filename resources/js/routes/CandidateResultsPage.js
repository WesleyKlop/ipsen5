import React from 'react'
import CardHeader from "../components/card/CardHeader";
import Card from "../components/card/Card";
import ApiClient from '../ApiClient'
import Spacer from "../components/Spacer";
import LinkButton from "../components/LinkButton";
import EmailPage from "./EmailPage";
import CardBody from "../components/card/CardBody";

class CandidateResultsPage extends React.Component {
    state = {
        results: [],
    }

    render() {
        return (
            <>
                <Spacer/>
                <Card style={{background: 'transparent', boxShadow: 'none'}}>
                    <CardHeader>
                        <h1>Resultaten</h1>
                    </CardHeader>
                    {this.state.results.map(result =>
                        <>
                            <span>{result.name}</span>
                            {result.propositions.map(proposition =>
                                <>
                                    <Card>
                                        <CardBody>
                                            {proposition.proposition}
                                        </CardBody>
                                    </Card>
                                    <br/>
                                </>
                            )}
                        </>
                    )}
                </Card>
                <LinkButton to={'/email'}>Resultaten E-mailen</LinkButton>
                <LinkButton to={'/email'}>Profiel aanpassen</LinkButton>
                <Spacer/>
            </>
        )
    }

    componentDidMount() {
        ApiClient.request('answer')
            .then(result => this.setResults(result))
            .catch(error => console.log(error))
    }

    setResults = (results) => {
        console.log(results)
        this.setState({
            results
        })
    }
}

export default CandidateResultsPage
