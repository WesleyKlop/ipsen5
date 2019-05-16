import React from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Button from '../components/card/Button'
import CodeInput from '../components/CodeInput'

class VoterMainPage extends React.Component {
    state = {
        loginCode: '',
    }

    render() {
        return (
            <>
                <div style={{ flex: '1' }}/>
                <Card>
                    <CardHeader>
                        Login met code
                    </CardHeader>
                    <CardBody>
                        <form onSubmit={this.loginVoter}>
                            <CodeInput value={this.state.loginCode} onChange={this.handleChange}/>
                            <CardButtons>
                                <Button className="block">Deelnemen</Button>
                            </CardButtons>
                        </form>
                    </CardBody>
                </Card>
                <div style={{ flex: '2' }}/>
            </>
        )
    }

    handleChange = (event) => (
        this.setState({ loginCode: event.currentTarget.value })
    )

    loginVoter = (e) => {
        e.preventDefault()
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
    }
}

export default VoterMainPage
