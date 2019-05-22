import React from 'react'
import Spacer from '../components/Spacer'
import Auth from "../Auth";
import PropositionList from "../components/PropositionList";
import Spinner from "../components/Spinner";

class PropositionPage extends React.Component {
    state = {
        propositions: [],
        isLoaded: false,
        errorMessage: '',
    }

    propositionId;

    handleMessageClose = () => this.setState({errorMessage: ''})

    componentDidMount = () => {
        // Clear error message before sending of another request
        this.setState({errorMessage: ''})
        fetch('/api/survey/proposition', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + Auth.getJWT(),
            },
        })
            .then(result => result.ok ? result.json() : Promise.reject('invalid'))
            .then(propositions => {
                this.setState({propositions})
                const isLoaded = true;
                this.setState({isLoaded})
                console.log(this.state)
            })
            .catch(errorMessage => this.setState({errorMessage}))
    }

    render = () => {
        return (
            <>
                <Spacer/>
                {!this.state.isLoaded
                    ? <Spinner/>
                    : <PropositionList proposition={this.props.match.params.propositionId}
                                       propositions={this.state.propositions}/>}
                <Spacer size={2}/>
            </>
        )
    }
}

export default PropositionPage
