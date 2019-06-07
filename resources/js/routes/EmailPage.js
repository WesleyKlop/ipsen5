import React from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import EmailInput from '../components/EmailInput'
import Button from '../components/Button'
import Spacer from '../components/Spacer'

class EmailPage extends React.Component {
  state = {
    email: '',
    emailValid: false,
    errorMessage: '',
  }

  render() {
    return (
      <>
        <Spacer />
        <Card>
          <CardHeader
            message={this.state.errorMessage}
            onMessageClose={this.dismissErrorMessage}
          >
            Resultaten E-mailen
          </CardHeader>
          <CardBody>
            <EmailInput value={this.state.email} onChange={this.handleChange} />
            <CardButtons>
              <Button
                className="block"
                disabled={!this.state.emailValid}
                onClick={this.sendEmail}
              >
                Verstuur
              </Button>
            </CardButtons>
          </CardBody>
        </Card>
        <Spacer size={2} />
      </>
    )
  }

  handleChange = e => {
    e.preventDefault()
    this.setState({
      email: e.currentTarget.value,
      emailValid:
        e.currentTarget.value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) !==
        null,
    })
  }

  sendEmail = e => {
    e.preventDefault()
    console.log(this.state.email)
  }
}

export default EmailPage
