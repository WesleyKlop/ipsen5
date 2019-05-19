import React from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Button from '../components/Button'
import CodeInput from '../components/CodeInput'

class VoterMainPage extends React.Component {
    state = {
        loginCode: '',
        loginCodeValid: false,
        errorMessage: '',
    }

    handleMessageClose = () => this.setState({ errorMessage: '' })

    render() {
        return (
            <>
                <div style={{ flex: '1' }}/>
                <Card>
                    <CardHeader message={this.state.errorMessage} onMessageClose={this.handleMessageClose}>
                        Login met code
                    </CardHeader>
                    <CardBody>
                        <form onSubmit={this.loginVoter}>
                            <CodeInput value={this.state.loginCode} onChange={this.handleChange}/>
                            <CardButtons>
                                <Button className="block" disabled={!this.state.loginCodeValid}>Deelnemen</Button>
                            </CardButtons>
                        </form>
                    </CardBody>
                </Card>
                <div style={{ flex: '2' }}/>
            </>
        )
    }

    handleChange = (event) => (
        this.setState({
            loginCode: event.currentTarget.value,
            loginCodeValid: event.currentTarget.validity.valid,
        })
    )

    loginVoter = (e) => {
        e.preventDefault()
        // Clear error message before sending of another request
        this.setState({ errorMessage: '' })
        fetch('/api/voter/login', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                code: this.state.loginCode,
            }),
        })
            .then(res => res.ok ? res.text() : Promise.reject('invalid code'))
            .then(res => console.log(res))
            .catch(errorMessage => this.setState({ errorMessage }))
    }
}

export default VoterMainPage
