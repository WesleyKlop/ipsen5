import React from 'react'
import Spacer from '../components/Spacer'
import Auth from "../Auth";
import PropositionList from "../components/PropositionList";

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
                this.state.isLoaded = true
                console.log(this.state)
            })
            .catch(errorMessage => this.setState({errorMessage}))
    }

    render = () => {
        return (
            <>
                <Spacer/>
                {/*<div*/}
                {/*    style={{*/}
                {/*        width: '100%',*/}
                {/*        flex: '1',*/}
                {/*        display: 'flex',*/}
                {/*        alignItems: 'center',*/}
                {/*        justifyContent: 'center'*/}
                {/*    }}>*/}
                {/*    <Spinner/>*/}
                {/*</div>*/}
                <PropositionList proposition={this.props.match.params.propositionId}
                                 propositions={this.state.propositions}/>
                <Spacer size={2}/>
            </>
        )
    }
}

export default PropositionPage
