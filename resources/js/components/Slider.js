import React from "react";

const Slider = ({ value }) => {


    const onValueChange = e => {
        // onChange(e)
        value = e.currentTarget.value,
        console.log(e.currentTarget.value)
    }

    return (
        <div class="slider">
            <input
                class="slider"
                type="range"
                min="0" max="100"
                value={value}
                onChange={onValueChange}
                step="1"/>
        </div>
    )
}

export default Slider
