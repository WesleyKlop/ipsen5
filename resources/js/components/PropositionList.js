import React from "react";
import Proposition from "./Proposition";

const PropositionList = ({proposition, survey, propositions, ...props}) => (
    <Proposition category='test' survey={survey} proposition={propositions[proposition]}/>
)

export default PropositionList
