import React, { Component } from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Button from '../components/Button'
import Input from '../components/Input'
import ImageInput from '../components/ImageInput'
import TextArea from '../components/TextArea'
import Spacer from '../components/Spacer'
import Spinner from '../components/Spinner'
import ApiClient from '../ApiClient'

class CandidateProfilePage extends Component {
    state = {
        isLoading: false,
    }

    handleSubmit = e => {
        e.preventDefault()
        this.setState({ isLoading: true })
        ApiClient.request('profile', 'POST', new FormData(e.currentTarget))
            .then(res => {
                this.setState({ isLoading: false })
                return res
            })
            .then(() => {
                this.props.history.push('/proposition/0')
            })
            .catch(err => console.error(err))
    }

    render() {
        const { isLoading } = this.state
        return (
            <>
                <Spacer/>
                <Card>
                    <CardHeader>Profiel</CardHeader>
                    <CardBody>
                        {isLoading ?
                            <div style={{ margin: 'auto' }}>
                                <Spinner/>
                            </div> :
                            <form className="profile-page__container" method="POST" onSubmit={this.handleSubmit}>
                                <ImageInput name="profile_picture" className="profile-page__pf" required capture/>
                                <Input name="first_name" placeholder="Voornaam" className="profile-page__fn" autoComplete="given-name" required/>
                                <Input name="last_name" placeholder="Achternaam" className="profile-page__ln" autoComplete="family-name" required/>
                                <Input name="party" placeholder="Partij" className="profile-page__prt" autoComplete="off" required/>
                                <Input name="function" placeholder="Functie" className="profile-page__fct" autoComplete="off" required/>
                                <TextArea name="bio" placeholder="Iets over jezelf" className="profile-page__bio" autoComplete="off" minLength={2} maxLength={255} required/>
                                <CardButtons>
                                    <Button className="block">Opslaan</Button>
                                </CardButtons>
                            </form>
                        }
                    </CardBody>
                </Card>
                <Spacer/>
            </>
        )
    }
}

export default CandidateProfilePage
