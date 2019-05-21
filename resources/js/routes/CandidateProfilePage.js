import React from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Button from '../components/card/Button'
import Input from '../components/Input'
import ImageInput from '../components/ImageInput'

const CandidateMainPage = ({ match }) => {

    return (
        <>
            <div style={{ flex: '1' }}/>
            <Card>
                <CardHeader>Profiel</CardHeader>
                <CardBody className="profile-page__container">
                    <ImageInput className="profile-page__pf"/>
                    <Input placeholder="Voornaam" className="profile-page__fn" autoComplete="given-name"/>
                    <Input placeholder="Achternaam" className="profile-page__ln" autoComplete="family-name"/>
                    <Input placeholder="Partij" className="profile-page__prt" autoComplete="off"/>
                    <TextArea placeholder="Iets over jezelf" className="profile-page__bio" autoComplete="off"/>
                    <CardButtons>
                        <Button className="block">Opslaan</Button>
                    </CardButtons>
                </CardBody>
            </Card>
            <div style={{ flex: '2' }}/>
        </>
    )
}

export default CandidateMainPage
