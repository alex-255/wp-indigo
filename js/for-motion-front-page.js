import { animate } from "https://cdn.jsdelivr.net/npm/motion@11.11.13/+esm";

animate(
    "#main-on-front",
    { scale: [0.4, 0.8, 0.6, 1] },
    { ease: "circInOut", duration: 1.2 }
);
