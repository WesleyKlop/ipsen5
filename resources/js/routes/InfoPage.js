import React from 'react'
import CardHeader from "../components/card/CardHeader";
import CardBody from "../components/card/CardBody";
import CardButtons from "../components/card/CardButtons";
import Button from "../components/card/Button";
import Card from "../components/card/Card";
import {Link} from 'react-router-dom'


class InfoPage extends React.Component {

    render() {
        return (
            <>
                <div style={{flex: '1'}}/>
                <Card>
                    <CardHeader>
                        Uitleg
                    </CardHeader>
                    <CardBody>
                        <h2>Over de pijling</h2>
                        <p>U zult een aantal stellingen krijgen die met eens of oneens te beantwoorden zijn.
                            Zodra u een optie kiest gaat u door naar de volgende stelling. Veel succes!</p>
                        <CardButtons>
                            <Link className="block" to={'/proposition/1'}>
                                <Button className="block">Begin</Button>
                            </Link>
                        </CardButtons>
                    </CardBody>
                </Card>
                <div style={{flex: '2'}}/>
            </>
        )
    }


}

export default InfoPage
