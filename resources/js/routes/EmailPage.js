import React from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import EmailInput from '../components/EmailInput'
import Button from '../components/Button'

class EmailPage extends React.Component {
    state = {
        email: '',
        emailValid: false,
        errorMessage: '',
    }

    render() {
        return (
            <>
                <div style={{ flex: '1' }}/>
                <Card>
                    <CardHeader message={this.state.errorMessage} onMessageClose={this.dismissErrorMessage}>
                        Resultaten E-mailen
                    </CardHeader>
                    <CardBody>
                        <EmailInput value={this.state.email} onChange={this.handleChange}/>
                        <CardButtons>
                            <Button className="block"  disabled={!this.state.emailValid} onClick={this.sendEmail} >Verstuur</Button>
                        </CardButtons>
                    </CardBody>
                </Card>
                <div style={{ flex: '2' }}/>
            </>

        )}
    handleChange = (event) => {
        event.preventDefault()
        this.setState({
            email: event.currentTarget.value,
            emailValid: (event.currentTarget.value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) !== null)
        })
    }

    sendEmail = (event) => {
        event.preventDefault()
        console.log(this.state.email)
    }
}

export default EmailPage
