import React from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import Button from '../components/card/Button'

const CandidateMainPage = ({ match }) => {

    return (
        <>
            <div style={{ flex: '1' }}/>
            <Card>
                <CardHeader>Profiel</CardHeader>
                <CardBody>
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
