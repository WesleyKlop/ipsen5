import React, { useEffect, useState } from 'react'
import Card from '../components/card/Card'
import CardHeader from '../components/card/CardHeader'
import CardBody from '../components/card/CardBody'
import CardButtons from '../components/card/CardButtons'
import { Link } from 'react-router-dom'
import Button from '../components/Button'
import Auth from '../Auth'
import ApiClient from "../ApiClient";

const CandidateMainPage = ({ match }) => {
    const [authenticated, setAuthenticated] = useState(false)

    useEffect(() => {
        ApiClient.request(`candidate/${match.params.loginCode}`)
            .then(result => {
                Auth.authenticate(result)
                setAuthenticated(true)
            })
            .catch(() => this.history.push('/'))
    }, [authenticated])

    return (
        <>
            <div style={{ flex: '1' }}/>
            <Card>
                <CardHeader>Welkom</CardHeader>
                <CardBody>
                    <h2>Alvast bedankt!</h2>
                    <p>
                        Dank u wel voor het meewerken aan deze peiling, samen met uw
                        gegevens zullen velen jongeren onderwezen worden. Uw profiel is al
                        aangemaakt, u hoeft alleen nog maar wat info over uzelf toe te
                        voegen.
                    </p>
                    <CardButtons>
                        <Link to="/profile" className="block">
                            <Button disabled={!authenticated} className="block">
                                Profiel aanvullen
                            </Button>
                        </Link>
                    </CardButtons>
                </CardBody>
            </Card>
            <div style={{ flex: '2' }}/>
        </>
    )
}

export default CandidateMainPage
