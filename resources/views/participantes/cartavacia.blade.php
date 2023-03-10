<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/pdf2htmlEX/pdf2htmlEX) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="generator" content="pdf2htmlEX" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <style type="text/css">
        /*!
 * Base CSS for pdf2htmlEX
 * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com>
 * https://github.com/pdf2htmlEX/pdf2htmlEX/blob/master/share/LICENSE
 */
        #sidebar {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            padding: 0;
            margin: 0;
            overflow: auto
        }

        #page-container {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            border: 0
        }

        @media screen {
            #sidebar.opened+#page-container {
                left: 250px
            }

            #page-container {
                bottom: 0;
                right: 0;
                overflow: auto
            }

            .loading-indicator {
                display: none
            }

            .loading-indicator.active {
                display: block;
                position: absolute;
                width: 64px;
                height: 64px;
                top: 50%;
                left: 50%;
                margin-top: -32px;
                margin-left: -32px
            }

            .loading-indicator img {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0
            }
        }

        @media print {
            @page {
                margin: 0
            }

            html {
                margin: 0
            }

            body {
                margin: 0;
                -webkit-print-color-adjust: exact
            }

            #sidebar {
                display: none
            }

            #page-container {
                width: auto;
                height: auto;
                overflow: visible;
                background-color: transparent
            }

            .d {
                display: none
            }
        }

        .pf {
            position: relative;
            background-color: white;
            overflow: hidden;
            margin: 0;
            border: 0
        }

        .pc {
            position: absolute;
            border: 0;
            padding: 0;
            margin: 0;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            display: block;
            transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            -webkit-transform-origin: 0 0
        }

        .pc.opened {
            display: block
        }

        .bf {
            position: absolute;
            border: 0;
            margin: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none
        }

        .bi {
            position: absolute;
            border: 0;
            margin: 0;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none
        }

        @media print {
            .pf {
                margin: 0;
                box-shadow: none;
                page-break-after: always;
                page-break-inside: avoid
            }

            @-moz-document url-prefix() {
                .pf {
                    overflow: visible;
                    border: 1px solid #fff
                }

                .pc {
                    overflow: visible
                }
            }
        }

        .c {
            position: absolute;
            border: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
            display: block
        }

        .t {
            position: absolute;
            white-space: pre;
            font-size: 1px;
            transform-origin: 0 100%;
            -ms-transform-origin: 0 100%;
            -webkit-transform-origin: 0 100%;
            unicode-bidi: bidi-override;
            -moz-font-feature-settings: "liga"0
        }

        .t:after {
            content: ''
        }

        .t:before {
            content: '';
            display: inline-block
        }

        .t span {
            position: relative;
            unicode-bidi: bidi-override
        }

        ._ {
            display: inline-block;
            color: transparent;
            z-index: -1
        }

        ::selection {
            background: rgba(127, 255, 255, 0.4)
        }

        ::-moz-selection {
            background: rgba(127, 255, 255, 0.4)
        }

        .pi {
            display: none
        }

        .d {
            position: absolute;
            transform-origin: 0 100%;
            -ms-transform-origin: 0 100%;
            -webkit-transform-origin: 0 100%
        }

        .it {
            border: 0;
            background-color: rgba(255, 255, 255, 0.0)
        }

        .ir:hover {
            cursor: pointer
        }
    </style>
    <style type="text/css">
        /*!
 * Fancy styles for pdf2htmlEX
 * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com>
 * https://github.com/pdf2htmlEX/pdf2htmlEX/blob/master/share/LICENSE
 */
        @keyframes fadein {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @-webkit-keyframes fadein {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes swing {
            0 {
                transform: rotate(0)
            }

            10% {
                transform: rotate(0)
            }

            90% {
                transform: rotate(720deg)
            }

            100% {
                transform: rotate(720deg)
            }
        }

        @-webkit-keyframes swing {
            0 {
                -webkit-transform: rotate(0)
            }

            10% {
                -webkit-transform: rotate(0)
            }

            90% {
                -webkit-transform: rotate(720deg)
            }

            100% {
                -webkit-transform: rotate(720deg)
            }
        }

        @media screen {
            #sidebar {
                background-color: #2f3236;
                background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjNDAzYzNmIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNCA0Wk00IDBMMCA0WiIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2U9IiMxZTI5MmQiPjwvcGF0aD4KPC9zdmc+")
            }

            #outline {
                font-family: Georgia, Times, "Times New Roman", serif;
                font-size: 13px;
                margin: 2em 1em
            }

            #outline ul {
                padding: 0
            }

            #outline li {
                list-style-type: none;
                margin: 1em 0
            }

            #outline li>ul {
                margin-left: 1em
            }

            #outline a,
            #outline a:visited,
            #outline a:hover,
            #outline a:active {
                line-height: 1.2;
                color: #e8e8e8;
                text-overflow: ellipsis;
                white-space: nowrap;
                text-decoration: none;
                display: block;
                overflow: hidden;
                outline: 0
            }

            #outline a:hover {
                color: #0cf
            }

            #page-container {
                background-color: #9e9e9e;

                background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1IiBoZWlnaHQ9IjUiPgo8cmVjdCB3aWR0aD0iNSIgaGVpZ2h0PSI1IiBmaWxsPSIjOWU5ZTllIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDVMNSAwWk02IDRMNCA2Wk0tMSAxTDEgLTFaIiBzdHJva2U9IiM4ODgiIHN0cm9rZS13aWR0aD0iMSI+PC9wYXRoPgo8L3N2Zz4=");-webkit-transition:left 500ms;transition:left 500ms}.pf{margin:13px auto;box-shadow:1px 1px 3px 1px #333;border-collapse:separate}.pc.opened{-webkit-animation:fadein 100ms;animation:fadein 100ms}.loading-indicator.active{-webkit-animation:swing 1.5s ease-in-out .01s infinite alternate none;animation:swing 1.5s ease-in-out .01s infinite alternate none}.checked{background:no-repeat url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3goQDSYgDiGofgAAAslJREFUOMvtlM9LFGEYx7/vvOPM6ywuuyPFihWFBUsdNnA6KLIh+QPx4KWExULdHQ/9A9EfUodYmATDYg/iRewQzklFWxcEBcGgEplDkDtI6sw4PzrIbrOuedBb9MALD7zv+3m+z4/3Bf7bZS2bzQIAcrmcMDExcTeXy10DAFVVAQDksgFUVZ1ljD3yfd+0LOuFpmnvVVW9GHhkZAQcxwkNDQ2FSCQyRMgJxnVdy7KstKZpn7nwha6urqqfTqfPBAJAuVymlNLXoigOhfd5nmeiKL5TVTV+lmIKwAOA7u5u6Lped2BsbOwjY6yf4zgQQkAIAcedaPR9H67r3uYBQFEUFItFtLe332lpaVkUBOHK3t5eRtf1DwAwODiIubk5DA8PM8bYW1EU+wEgCIJqsCAIQAiB7/u253k2BQDDMJBKpa4mEon5eDx+UxAESJL0uK2t7XosFlvSdf0QAEmlUnlRFJ9Waho2Qghc1/U9z3uWz+eX+Wr+lL6SZfleEAQIggA8z6OpqSknimIvYyybSCReMsZ6TislhCAIAti2Dc/zejVNWwCAavN8339j27YbTg0AGGM3WltbP4WhlRWq6Q/btrs1TVsYHx+vNgqKoqBUKn2NRqPFxsbGJzzP05puUlpt0ukyOI6z7zjOwNTU1OLo6CgmJyf/gA3DgKIoWF1d/cIY24/FYgOU0pp0z/Ityzo8Pj5OTk9PbwHA+vp6zWghDC+VSiuRSOQgGo32UErJ38CO42wdHR09LBQK3zKZDDY2NupmFmF4R0cHVlZWlmRZ/iVJUn9FeWWcCCE4ODjYtG27Z2Zm5juAOmgdGAB2d3cBADs7O8uSJN2SZfl+WKlpmpumaT6Yn58vn/fs6XmbhmHMNjc3tzDGFI7jYJrm5vb29sDa2trPC/9aiqJUy5pOp4f6+vqeJ5PJBAB0dnZe/t8NBajx/z37Df5OGX8d13xzAAAAAElFTkSuQmCC)}}</style>
<style type="text/css"> .ff0 {
                        font-family:sans-serif; visibility:hidden;
                    }

                    @font-face {
                        font-family:ff1; src:url('data:application/font-woff;base64,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vNm9ObwxXumJp17l1V7jtV7n9d6c3lze3N483rzefN783gLegt5C3sLeIt6i3mLe4t4S3pLeUt7S3jLest5y3vLeCt6K3kreyt4q3qreat7q3hremt5a3treOt663nre+t4G3obeRt7G3ibept5m3ubeFt6W3lbe1t423rbedt723g7ejt5O3s7eLt6u3m7e7t4e3p7eXt7e3j7evt5+3v7eAd6B3kHewd4h3qHeYd7h3hHekd5R3tHeMd6x3nHe8d4J3oneSd7J3ineqd5p3uneGd6Z3lne2d453rneed753gXehd5F3sXeJd6l3mXe5d4V3pXeVd7V3jXetd513vXeDd6N3k3ezd4t3q3ebd7t3h3end5d3t3ePd693n3e/d4D3oPeQ97D3iPeo95j3uPeE96T3lPe094z3rPec97z3gvei95L3sveK96r3mve694b3pveW97b3jveu9573vveB96H3kfex94n3qfeZ97n3hfel95X3tfeN9633nfe994P3o/eT97P3i/er95v3u/eH96f3l/e394/3r/ef/6I7/iu7/m+H/ihH/mxn/ipn/m5X/gDfyx/bH8cf1x/PH98fwJ/Qn8if2J/En9SfzJ/cn8Kf0p/Kn9qfxp/Wn86f3p/Bn9Gf5Q/2p/Jn9mfxZ/Vn82f3Z/DH+OXvvjqV37tN37rd37vz+nP5c/tz+PP68/nz+8v4C/oL+Qv7C/iL+ov5i/uL+Ev6S/lL+0v4y/rL+cv76/gr+iv5K/sr+Kv6q/mr+6v4a/pr+Wv7a/jr+uv56/vb+Bv6G/kb+xv4m/qb+Zv7m/hb+lv5W/tb+Nv62/nb+/v4O/o7+Tv7O/i7+rv5u/u7+Hv6e/l7+3v4+/r7+fv7x/gH+gf5B/sH+If6h/mH+4f4R/pH+Uf7R/jH+sf5x/vn+Cf6J/kn+yf4p/qn+af7p/hn+mf5Z/tn+Of65/nn+9f4F/oX+Rf7F/iX+pf5l/uX+Ff6V/lX+1f41/rX+df79/g3+jf5N/s3+Lf6t/m3+7f4d/p3+Xf7d/j3+vf59/vP+A/6D/kP+w/4j/qP+Y/7j/hP+k/5T/tP+M/6z/nP++/4L/ov+S/7L/iv+q/5r/uv+G/6b/lv+2/47/rv+e/73/gf+h/5H/sf+J/6n/mf+5/4X/pf+V/7X/jf+t/53/v/+D/6P/k/+z/4v/q/+b/7v/h/+n/5f/t/+P/6/8XjARO4AZe4AdBEAZREAdJkAZZkAdFMAjGCsYOxgnGDcYLxg8mCCYMJgomDiYJJg0mCyYPpgimDKYKpg6mCaYNpgumD2YIZgxGBaODmYKZg1mCWYPZgtmDOYIxQRlIoEEV1EETtEEX9MGcwVzB3ME8wbzBfMH8wQLBgsFCwcLBIsGiwWLB4sESwZLBUsHSwTLBssFywfLBCsGKwUrBysEqwarBasHqwRrBmsFawdrBOsG6wXrB+sEGwYbBRsHGwSbBpsFmwebBFsGWwVbB1sE2wbbBdsH2wQ7BjsFOwc7BLsGuwW7B7sEewZ7BXsHewT7BvsF+wf7BAcGBwUHBwcEhwaHBYcHhwRHBkcFRwdHBMcGxwXHB8cEJwYnBScHJwSnBqcFpwenBGcGZwVnB2cE5wbnBecH5wQXBhcFFwcXBJcGlwWXB5cEVwZXBVcHVwTXBtcF1wfXBDcGNwU3BzcEtwa3BbcHtwR3BncFdwd3BPcG9wX3B/cEDwYPBQ8HDwSPBo8FjwePBE8GTwVPB08EzwbPBc8HzwQvBi8FLwcvBK8GrwWvB68EbwZvBW8HbwTvBu8F7wfvBB8GHwUfBx8EnwafBZ8HnwRfBl8FXwdfBN8G3wXfB98EPwY/BT8HPwS/Br8Fvwe/BH8GfwV/B38E/wb/Bf+FI6IRu6IV+GIRhGIVxmIRpmIV5WISDcKxw7HCccNxwvHD8cIJwwnCicOJwknDScLJw8nCKcMpwqnDqcJpw2nC6cPpwhnDGcFQ4OpwpnDmcJZw1nC2cPZwjHBOWoYQaVmEdNmEbdmEfzhnOFc4dzhPOG84Xzh8uEC4YLhQuHC4SLhouFi4eLhEuGS4VLh0uEy4bLhcuH64QrhiuFK4crhKuGq4Wrh6uEa4ZrhWuHa4TrhuuF64fbhBuGG4UbhxuEm4abhZuHm4RbhluFW4dbhNuG24Xbh/uEO4Y7hTuHO4S7hruFu4e7hHuGe4V7h3uE+4b7hfuHx4QHhgeFB4cHhIeGh4WHh4eER4ZHhUeHR4THhseFx4fnhCeGJ4UnhyeEp4anhaeHp4RnhmeFZ4dnhOeG54Xnh9eEF4YXhReHF4SXhpeFl4eXhFeGV4VXh1eE14bXhdeH94Q3hjeFN4c3hLeGt4W3h7eEd4Z3hXeHd4T3hveF94fPhA+GD4UPhw+Ej4aPhY+Hj4RPhk+FT4dPhM+Gz4XPh++EL4YvhS+HL4Svhq+Fr4evhG+Gb4Vvh2+E74bvhe+H34Qfhh+FH4cfhJ+Gn4Wfh5+EX4ZfhV+HX4Tfht+F34f/hD+GP4U/hz+Ev4a/hb+Hv4R/hn+Ff4d/hP+G/4XjURO5EZe5EdBFEZRFEdJlEZZlEdFNIjGisaOxonGjcaLxo8miCaMJoomjiaJJo0miyaPpoimjKaKpo6miaaNpoumj2aIZoxGRaOjmaKZo1miWaPZotmjOaIxURlJpFEV1VETtVEX9dGc0VzR3NE80bzRfNH80QLRgtFC0cLRItGi0WLR4tES0ZLRUtHS0TLRstFy0fLRCtGK0UrRytEq0arRatHq0RrRmtFa0drROtG60XrR+tEG0YbRRtHG0SbRptFm0ebRFtGW0VbR1tE20bbRdtH20Q7RjtFO0c7RLtGu0W7R7tEe0Z7RXtHe0T7RvtF+0f7RAdGB0UHRwdEh0aHRYdHh0RHRkdFR0dHRMdGx0XHR8dEJ0YnRSdHJ0SnRqdFp0enRGdGZ0VnR2dE50bnRedH50QXRhdFF0cXRJdGl0WXR5dEV0ZXRVdHV0TXRtdF10fXRDdGN0U3RzdEt0a3RbdHt0R3RndFd0d3RPdG90X3R/dED0YPRQ9HD0SPRo9Fj0ePRE9GT0VPR09Ez0bPRc9Hz0QvRi9FL0cvRK9Gr0WvR69Eb0ZvRW9Hb0TvRu9F70fvRB9GH0UfRx9En0afRZ9Hn0RfRl9FX0dfRN9G30XfR99EP0Y/RT9HP0S/Rr9Fv0e/RH9Gf0V/R39E/0b/Rf/FI7MRu7MV+HMRhHMVxnMRpnMV5XMSDeKx47HiceNx4vHj8eIJ4wniieOJ4knjSeLJ48niKeMp4qnjqeJp42ni6ePp4hnjGeFQ8Op4pnjmeJZ41ni2ePZ4jHhOXscQaV3EdN3Ebd3EfzxnPFc8dzxPPG88Xzx8vEC8YLxQvHC8SLxovFi8eLxEvGS8VLx0vEy8bLxcvH68QrxivFK8crxKvGq8Wrx6vEa8ZrxWvHa8TrxuvF68fbxBvGG8UbxxvEm8abxZvHm8RbxlvFW8dbxNvG28Xbx/vEO8Y7xTvHO8S7xrvFu8e7xHvGe8V7x3vE+8b7xfvHx8QHxgfFB8cHxIfGh8WHx4fER8ZHxUfHR8THxsfFx8fnxCfGJ8UnxyfEp8anxafHp8RnxmfFZ8dnxOfG58Xnx9fEF8YXxRfHF8SXxpfFl8eXxFfGV8VXx1fE18bXxdfH98Q3xjfFN8c3xLfGt8W3x7fEd8Z3xXfHd8T3xvfF98fPxA/GD8UPxw/Ej8aPxY/Hj8RPxk/FT8dPxM/Gz8XPx+/EL8YvxS/HL8Svxq/Fr8evxG/Gb8Vvx2/E78bvxe/H38Qfxh/FH8cfxJ/Gn8Wfx5/EX8ZfxV/HX8Tfxt/F38f/xD/GP8U/xz/Ev8a/xb/Hv8R/xn/Ff8d/xP/G/+XjCRO4iZe4idBEiZREidJkiZZkidFMkjGSsZOxknGTcZLxk8mSCZMJkomTiZJJk0mSyZPpkimTKZKpk6mSaZNpkumT2ZIZkxGJaOTmZKZk1mSWZPZktmTOZIxSZlIokmV1EmTtEmX9MmcyVzJ3Mk8ybzJfMn8yQLJgslCycLJIsmiyWLJ4skSyZLJUsnSyTLJsslyyfLJCsmKyUrJyskqyarJasnqyRrJmslaydrJOsm6yXrJ+skGyYbJRsnGySbJpslmyebJFsmWyVbJ1sk2ybbJdsn2yQ7JjslOyc7JLsmuyW7J7skeyZ7JXsneyT7Jvsl+yf7JAcmByUHJwckhyaHJYcnhyRHJkclRydHJMcmxyXHJ8ckJyYnJScnJySnJqclpyenJGcmZyVnJ2ck5ybnJecn5yQXJhclFycXJJcmlyWXJ5ckVyZXJVcnVyTXJtcl1yfXJDcmNyU3Jzcktya3JbcntyR3Jncldyd3JPcm9yX3J/ckDyYPJQ8nDySPJo8ljyePJE8mTyVPJ08kzybPJc8nzyQvJi8lLycvJK8mryWvJ68kbyZvJW8nbyTvJu8l7yfvJB8mHyUfJx8knyafJZ8nnyRfJl8lXydfJN8m3yXfJ98kPyY/JT8nPyS/Jr8lvye/JH8mfyV/J38k/yb/Jf+lI6qRu6qV+GqRhGqVxmqRpmqV5WqSDdKx07HScdNx0vHT8dIJ0wnSidOJ0knTSdLJ08nSKdMp0qnTqdJp02nS6dPp0hnTGdFQ6Op0pnTmdJZ01nS2dPZ0jHZOWqaSaVmmdNmmbdmmfzpnOlc6dzpPOm86Xzp8ukC6YLpQunC6SLpouli6eLpEumS6VLp0uky6bLpcun66QrpiulK6crpKumq6Wrp6uka6ZrpWuna6Trpuul66fbpBumG6Ubpxukm6abpZunm6RbplulW6dbpNum26Xbp/ukO6Y7pTunO6S7prulu6e7pHume6V7p3uk+6b7pfunx6QHpgelB6cHpIemh6WHp4ekR6ZHpUenR6THpselx6fnpCemJ6Unpyekp6anpaenp6RnpmelZ6dnpOem56Xnp9ekF6YXpRenF6SXppell6eXpFemV6VXp1ek16bXpden96Q3pjelN6c3pLemt6W3p7ekd6Z3pXend6T3pvel96fPpA+mD6UPpw+kj6aPpY+nj6RPpk+lT6dPpM+mz6XPp++kL6YvpS+nL6Svpq+lr6evpG+mb6Vvp2+k76bvpe+n36Qfph+lH6cfpJ+mn6Wfp5+kX6ZfpV+nX6Tfpt+l36f/pD+mP6U/pz+kv6a/pb+nv6R/pn+lf6d/pP+m/6XjWRO5mZe5mdBFmZRFmdJlmZZlmdFNsjGysbOxsnGzcbLxs8myCbMJsomzibJJs0myybPpsimzKbKps6myabNpsumz2bIZsxGZaOzmbKZs1myWbPZstmzObIxWZlJplmV1VmTtVmX9dmc2VzZ3Nk82bzZfNn82QLZgtlC2cLZItmi2WLZ4tkS2ZLZUtnS2TLZstly2fLZCtmK2UrZytkq2arZatnq2RrZmtla2drZOtm62XrZ+tkG2YbZRtnG2SbZptlm2ebZFtmW2VbZ1tk22bbZdtn22Q7ZjtlO2c7ZLtmu2W7Z7tke2Z7ZXtne2T7Zvtl+2f7ZAdmB2UHZwdkh2aHZYdnh2RHZkdlR2dHZMdmx2XHZ8dkJ2YnZSdnJ2SnZqdlp2enZGdmZ2VnZ2dk52bnZedn52QXZhdlF2cXZJdml2WXZ5dkV2ZXZVdnV2TXZtdl12fXZDdmN2U3Zzdkt2a3Zbdnt2R3Zndld2d3ZPdm92X3Z/dkD2YPZQ9nD2SPZo9lj2ePZE9mT2VPZ09kz2bPZc9nz2QvZi9lL2cvZK9mr2WvZ69kb2ZvZW9nb2TvZu9l72fvZB9mH2UfZx9kn2afZZ9nn2RfZl9lX2dfZN9m32XfZ99kP2Y/ZT9nP2S/Zr9lv2e/ZH9mf2V/Z39k/2b/Zf/lI7uRu7uV+HuRhHuVxnuRpnuV5XuSDfKx87HycfNx8vHz8fIJ8wnyifOJ8knzSfLJ88nyKfMp8qnzqfJp82ny6fPp8hnzGfFQ+Op8pnzmfJZ81ny2fPZ8jH5OXueSaV3mdN3mbd3mfz5nPlc+dz5PPm8+Xz58vkC+YL5QvnC+SL5ovli+eL5EvmS+VL50vky+bL5cvn6+Qr5ivlK+cr5Kvmq+Wr56vka+Zr5Wvna+Tr5uvl6+fb5BvmG+Ub5xvkm+ab5Zvnm+Rb5lvlW+db5Nvm2+Xb5/vkO+Y75TvnO+S75rvlu+e75Hvme+V753vk++b75fvnx+QH5gflB+cH5Ifmh+WH54fkR+ZH5UfnR+TH5sflx+fn5CfmJ+Un5yfkp+an5afnp+Rn5mflZ+dn5Ofm5+Xn59fkF+YX5RfnF+SX5pfll+eX5FfmV+VX51fk1+bX5dfn9+Q35jflN+c35Lfmt+W357fkd+Z35Xfnd+T35vfl9+fP5A/mD+UP5w/kj+aP5Y/nj+RP5k/lT+dP5M/mz+XP5+/kL+Yv5S/nL+Sv5q/lr+ev5G/mb+Vv52/k7+bv5e/n3+Qf5h/lH+cf5J/mn+Wf55/kX+Zf5V/nX+Tf5t/l3+f/5D/mP+U/5z/kv+a/5b/nv+R/5n/lf+d/5P/m/9XjBRO4RZe4RdBERZRERdJkRZZkRdFMSjGKsYuxinGLcYrxi8mKCYsJiomLiYpJi0mKyYvpiimLKYqpi6mKaYtpiumL2YoZixGFaOLmYqZi1mKWYvZitmLOYoxRVlIoUVV1EVTtEVX9MWcxVzF3MU8xbzFfMX8xQLFgsVCxcLFIsWixWLF4sUSxZLFUsXSxTLFssVyxfLFCsWKxUrFysUqxarFasXqxRrFmsVaxdrFOsW6xXrF+sUGxYbFRsXGxSbFpsVmxebFFsWWxVbF1sU2xbbFdsX2xQ7FjsVOxc7FLsWuxW7F7sUexZ7FXsXexT7FvsV+xf7FAcWBxUHFwcUhxaHFYcXhxRHFkcVRxdHFMcWxxXHF8cUJxYnFScXJxSnFqcVpxenFGcWZxVnF2cU5xbnFecX5xQXFhcVFxcXFJcWlxWXF5cUVxZXFVcXVxTXFtcV1xfXFDcWNxU3FzcUtxa3FbcXtxR3FncVdxd3FPcW9xX3F/cUDxYPFQ8XDxSPFo8VjxePFE8WTxVPF08UzxbPFc8XzxQvFi8VLxcvFK8WrxWvF68UbxZvFW8XbxTvFu8V7xfvFB8WHxUfFx8UnxafFZ8XnxRfFl8VXxdfFN8W3xXfF98UPxY/FT8XPxS/Fr8Vvxe/FH8WfxV/F38U/xb/Ff4ORgTNwB97AHwSDcBAN4kEySAfZIB8Ug8FgrMHYg3EG4w7GG4w/mGAw4WCiwcSDSQaTDiYbTD6YYjDlYKrB1INpBtMOphtMP5hhMONg1GD0YKbBzINZBrMOZhvMPphjMGZQDmSgg2pQD5pBO+gG/WDOwVyDuQfzDOYdzDeYf7DAYMHBQoOFB4vEy26wzSbLbDL7mP8d5f8O+d9R/e+o/3c0/zva/x3d/44++d9zxgyvcnjJ8NLhVQ2veng1w6sdXt3wGm7IcEOGGzLckOGGDDdkuCHDDRluyHBDhhs63NDhhg43dLihww0dbujwydXwd6vh71bDz1XDd6mHP62H71IP36UZvksz/FwzfINm+AbN8MnN8MnN8F2a4ZOb4ZPb4ZPb4Zu2w412uNEON9rhRjvcaIcb7XCjHW50w41uuNENN7rhRjfc6IYb3XCjG250w41uuNEPN/rhRj/c6Icb/XCjH270w41+uNEPN/o+Hf5lj7GztFPtrOys7WzsbO3s7LSJ0iZKmyjFTlsrba20tdLWSlsrba20NbE1sTWxNbE1sTWxNbE1sTWxNbE1tTW1NbU1tTW1NbU1tTW1NbU1tbXK1ipbq2ytsrXK1ipbq2ytsrXK1ipbq22ttrXa1mpbq22ttrXa1mpbq22ttrXG1hpba2ytsbXG1hpba2ytsbXG1hpba22ttbXW1lpba22ttbXW1lpba22ttbXO1jpb62yts7XO1jpb62yts7XO1jpb622tt7Xe1npb622tt7Xe1npb623NABFTQ8aInWpnZWdtZ2NnZ6c919QQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0NMDTE1xNQQU0Pt3w41QNQAUQNEDRA1QNQAUfsPRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzRM0SNUvULFGzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6QySyqzpDJLKrOkMksqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkNktqs6Q2S2qzpDZLarOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDFLGrOkMUsas6QxSxqzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6Q1S1qzpDVLWrOkNUtas6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkM0s6s6QzSzqzpDNLOrOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S3qzpDdLerOkN0t6s6Q3S/q+z/7fWY4ZMwZ3iVtwK+4Kd427wd3i7nBjt8Ruid0SuyV2S+yW2C2xW2K3xG6JXcGuYFewK9gV7Ap2BbuCXcGuYFexq9hV7Cp2FbuKXcWuYlexq9itsFtht8Juhd0KuxV2K+xW2K2wW2G3xm6N3Rq7NXZr7NbYrbFbY7fGbo3dBrsNdhvsNthtsNtgt8Fug90Guw12W+y22G2x22K3xW6L3Ra7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gr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0LcL+nZB3y7o2wV9u6BvF/Ttgr5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir5d0bcr+nZF367o2xV9u6JvV/Ttir79/97N/wEjSvAwAAAAAQAB//8ADwABAAAADAAAABYAAAACAAEAAQ1bAAEABAAAAAIAAAAAAAAAAQAAAADbIL/uAAAAAKLjPB0AAAAA4C/ttw==')format("woff");
                    }

                    .ff1 {
                        font-family:ff1; line-height:0.915527; font-style:normal; font-weight:normal; visibility:visible;
                    }

                    @font-face {
                        font-family:ff2; src:url('data:application/font-woff;base64,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')format("woff");}.ff2{font-family:ff2;line-height:1.002930;font-style:normal;font-weight:normal;visibility:visible;}
@font-face{font-family:ff3;src:url('data:application/font-woff;base64,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')format("woff");
                    }

                    .ff3 {
                        font-family:ff3; line-height:1.002930; font-style:normal; font-weight:normal; visibility:visible;
                    }

                    .m0 {
                        transform:matrix(0.375000, 0.000000, 0.000000, 0.375000, 0, 0); -ms-transform:matrix(0.375000, 0.000000, 0.000000, 0.375000, 0, 0); -webkit-transform:matrix(0.375000, 0.000000, 0.000000, 0.375000, 0, 0);
                    }

                    .m1 {
                        transform:matrix(1.500000, 0.000000, 0.000000, 1.500000, 0, 0); -ms-transform:matrix(1.500000, 0.000000, 0.000000, 1.500000, 0, 0); -webkit-transform:matrix(1.500000, 0.000000, 0.000000, 1.500000, 0, 0);
                    }

                    .v0 {
                        vertical-align:0.000000px;
                    }

                    .ls0 {
                        letter-spacing:0.000000px;
                    }

                    .sc_ {
                        text-shadow:none;
                    }

                    .sc0 {
                        text-shadow:-0.015em 0 transparent, 0 0.015em transparent, 0.015em 0 transparent, 0 -0.015em transparent;
                    }

                    @media screen and (-webkit-min-device-pixel-ratio:0) {
                        .sc_ {
                            -webkit-text-stroke:0px transparent;
                        }

                        .sc0 {
                            -webkit-text-stroke:0.015em transparent; text-shadow:none;
                        }
                    }

                    .ws0 {
                        word-spacing:0.000000px;
                    }

                    ._0 {
                        margin-left:-2.121325px;
                    }

                    ._1 {
                        margin-left:-1.060663px;
                    }

                    ._e {
                        width:27.304524px;
                    }

                    ._d {
                        width:113.465342px;
                    }

                    ._4 {
                        width:118.111885px;
                    }

                    ._c {
                        width:147.432478px;
                    }

                    ._5 {
                        width:148.469836px;
                    }

                    ._b {
                        width:156.269496px;
                    }

                    ._3 {
                        width:217.080639px;
                    }

                    ._2 {
                        width:234.650299px;
                    }

                    ._6 {
                        width:432.189533px;
                    }

                    ._a {
                        width:510.145850px;
                    }

                    ._8 {
                        width:539.287796px;
                    }

                    ._7 {
                        width:977.016590px;
                    }

                    ._9 {
                        width:1015.468001px;
                    }

                    .fc1 {
                        color:transparent;
                    }

                    .fc0 {
                        color:rgb(0, 0, 0);
                    }

                    .fs4 {
                        font-size:21.499920px;
                    }

                    .fs5 {
                        font-size:23.888800px;
                    }

                    .fs1 {
                        font-size:26.277679px;
                    }

                    .fs3 {
                        font-size:26.277680px;
                    }

                    .fs0 {
                        font-size:28.666559px;
                    }

                    .fs2 {
                        font-size:28.666560px;
                    }

                    .y0 {
                        bottom:-0.750000px;
                    }

                    .yf {
                        bottom:2.463178px;
                    }

                    .ye {
                        bottom:2.662228px;
                    }

                    .yc {
                        bottom:2.662234px;
                    }

                    .y8 {
                        bottom:2.662240px;
                    }

                    .y2f {
                        bottom:4.734857px;
                    }

                    .y2e {
                        bottom:18.540975px;
                    }

                    .y2d {
                        bottom:47.259217px;
                    }

                    .y2c {
                        bottom:61.730317px;
                    }

                    .y9 {
                        bottom:79.621732px;
                    }

                    .y1 {
                        bottom:79.621735px;
                    }

                    .y2b {
                        bottom:91.230517px;
                    }

                    .y2a {
                        bottom:133.958017px;
                    }

                    .y29 {
                        bottom:185.644417px;
                    }

                    .y28 {
                        bottom:243.533167px;
                    }

                    .y27 {
                        bottom:295.908817px;
                    }

                    .y26 {
                        bottom:347.595216px;
                    }

                    .y25 {
                        bottom:400.681303px;
                    }

                    .y24 {
                        bottom:439.459027px;
                    }

                    .y21 {
                        bottom:442.225764px;
                    }

                    .y1f {
                        bottom:448.050037px;
                    }

                    .y23 {
                        bottom:449.106427px;
                    }

                    .y20 {
                        bottom:454.251937px;
                    }

                    .y22 {
                        bottom:460.453837px;
                    }

                    .y1b {
                        bottom:490.527539px;
                    }

                    .y1e {
                        bottom:497.040912px;
                    }

                    .y1a {
                        bottom:502.553712px;
                    }

                    .y17 {
                        bottom:508.689459px;
                    }

                    .y1d {
                        bottom:509.067085px;
                    }

                    .y19 {
                        bottom:514.579885px;
                    }

                    .y1c {
                        bottom:521.093259px;
                    }

                    .y18 {
                        bottom:526.606059px;
                    }

                    .y16 {
                        bottom:561.060369px;
                    }

                    .y15 {
                        bottom:586.868542px;
                    }

                    .y14 {
                        bottom:600.650542px;
                    }

                    .y13 {
                        bottom:615.121642px;
                    }

                    .y11 {
                        bottom:628.903642px;
                    }

                    .y10 {
                        bottom:640.929815px;
                    }

                    .y12 {
                        bottom:642.685642px;
                    }

                    .ya {
                        bottom:664.426715px;
                    }

                    .y6 {
                        bottom:684.039422px;
                    }

                    .y5 {
                        bottom:699.061113px;
                    }

                    .y4 {
                        bottom:714.910412px;
                    }

                    .y3 {
                        bottom:730.759711px;
                    }

                    .yd {
                        bottom:733.627170px;
                    }

                    .y2 {
                        bottom:746.609010px;
                    }

                    .yb {
                        bottom:747.410214px;
                    }

                    .y7 {
                        bottom:761.193258px;
                    }

                    .h5 {
                        height:13.093892px;
                    }

                    .h7 {
                        height:17.731135px;
                    }

                    .h8 {
                        height:19.701261px;
                    }

                    .h4 {
                        height:21.671386px;
                    }

                    .h6 {
                        height:23.641514px;
                    }

                    .h3 {
                        height:25.881087px;
                    }

                    .h2 {
                        height:758.756572px;
                    }

                    .h0 {
                        height:918.000000px;
                    }

                    .h1 {
                        height:918.750000px;
                    }

                    .w7 {
                        width:36.525067px;
                    }

                    .w5 {
                        width:77.185046px;
                    }

                    .w6 {
                        width:87.522329px;
                    }

                    .w4 {
                        width:128.871461px;
                    }

                    .w3 {
                        width:175.044659px;
                    }

                    .w2 {
                        width:1017.188647px;
                    }

                    .w0 {
                        width:1188.000000px;
                    }

                    .w1 {
                        width:1188.750000px;
                    }

                    .x0 {
                        left:0.000000px;
                    }

                    .x8 {
                        left:2.067503px;
                    }

                    .xa {
                        left:6.891542px;
                    }

                    .x6 {
                        left:48.268947px;
                    }

                    .x15 {
                        left:66.157196px;
                    }

                    .x1c {
                        left:68.913596px;
                    }

                    .x1 {
                        left:85.405650px;
                    }

                    .x16 {
                        left:110.258907px;
                    }

                    .x17 {
                        left:130.242807px;
                    }

                    .x18 {
                        left:224.648128px;
                    }

                    .xe {
                        left:305.960550px;
                    }

                    .xf {
                        left:318.364350px;
                    }

                    .xd {
                        left:319.742550px;
                    }

                    .x5 {
                        left:369.389531px;
                    }

                    .x2 {
                        left:421.761128px;
                    }

                    .x3 {
                        left:430.719428px;
                    }

                    .x4 {
                        left:441.055927px;
                    }

                    .x11 {
                        left:505.107003px;
                    }

                    .x10 {
                        left:512.687103px;
                    }

                    .xc {
                        left:516.131914px;
                    }

                    .x7 {
                        left:599.513195px;
                    }

                    .x1e {
                        left:669.798457px;
                    }

                    .x1d {
                        left:689.782357px;
                    }

                    .x12 {
                        left:750.422468px;
                    }

                    .x14 {
                        left:755.246168px;
                    }

                    .x13 {
                        left:768.339068px;
                    }

                    .x9 {
                        left:775.247006px;
                    }

                    .x1b {
                        left:783.498579px;
                    }

                    .x19 {
                        left:800.726079px;
                    }

                    .x1a {
                        left:867.567400px;
                    }

                    .xb {
                        left:939.265229px;
                    }

                    @media print {
                        .v0 {
                            vertical-align:0.000000pt;
                        }

                        .ls0 {
                            letter-spacing:0.000000pt;
                        }

                        .ws0 {
                            word-spacing:0.000000pt;
                        }

                        ._0 {
                            margin-left:-1.885623pt;
                        }

                        ._1 {
                            margin-left:-0.942811pt;
                        }

                        ._e {
                            width:24.270688pt;
                        }

                        ._d {
                            width:100.858082pt;
                        }

                        ._4 {
                            width:104.988343pt;
                        }

                        ._c {
                            width:131.051092pt;
                        }

                        ._5 {
                            width:131.973188pt;
                        }

                        ._b {
                            width:138.906219pt;
                        }

                        ._3 {
                            width:192.960568pt;
                        }

                        ._2 {
                            width:208.578044pt;
                        }

                        ._6 {
                            width:384.168474pt;
                        }

                        ._a {
                            width:453.462978pt;
                        }

                        ._8 {
                            width:479.366930pt;
                        }

                        ._7 {
                            width:868.459191pt;
                        }

                        ._9 {
                            width:902.638223pt;
                        }

                        .fs4 {
                            font-size:19.111040pt;
                        }

                        .fs5 {
                            font-size:21.234489pt;
                        }

                        .fs1 {
                            font-size:23.357937pt;
                        }

                        .fs3 {
                            font-size:23.357938pt;
                        }

                        .fs0 {
                            font-size:25.481385pt;
                        }

                        .fs2 {
                            font-size:25.481387pt;
                        }

                        .y0 {
                            bottom:-0.666667pt;
                        }

                        .yf {
                            bottom:2.189491pt;
                        }

                        .ye {
                            bottom:2.366425pt;
                        }

                        .yc {
                            bottom:2.366430pt;
                        }

                        .y8 {
                            bottom:2.366435pt;
                        }

                        .y2f {
                            bottom:4.208761pt;
                        }

                        .y2e {
                            bottom:16.480867pt;
                        }

                        .y2d {
                            bottom:42.008193pt;
                        }

                        .y2c {
                            bottom:54.871393pt;
                        }

                        .y9 {
                            bottom:70.774873pt;
                        }

                        .y1 {
                            bottom:70.774876pt;
                        }

                        .y2b {
                            bottom:81.093793pt;
                        }

                        .y2a {
                            bottom:119.073793pt;
                        }

                        .y29 {
                            bottom:165.017260pt;
                        }

                        .y28 {
                            bottom:216.473926pt;
                        }

                        .y27 {
                            bottom:263.030059pt;
                        }

                        .y26 {
                            bottom:308.973526pt;
                        }

                        .y25 {
                            bottom:356.161158pt;
                        }

                        .y24 {
                            bottom:390.630247pt;
                        }

                        .y21 {
                            bottom:393.089568pt;
                        }

                        .y1f {
                            bottom:398.266700pt;
                        }

                        .y23 {
                            bottom:399.205713pt;
                        }

                        .y20 {
                            bottom:403.779500pt;
                        }

                        .y22 {
                            bottom:409.292300pt;
                        }

                        .y1b {
                            bottom:436.024479pt;
                        }

                        .y1e {
                            bottom:441.814144pt;
                        }

                        .y1a {
                            bottom:446.714411pt;
                        }

                        .y17 {
                            bottom:452.168408pt;
                        }

                        .y1d {
                            bottom:452.504076pt;
                        }

                        .y19 {
                            bottom:457.404343pt;
                        }

                        .y1c {
                            bottom:463.194008pt;
                        }

                        .y18 {
                            bottom:468.094274pt;
                        }

                        .y16 {
                            bottom:498.720328pt;
                        }

                        .y15 {
                            bottom:521.660927pt;
                        }

                        .y14 {
                            bottom:533.911593pt;
                        }

                        .y13 {
                            bottom:546.774793pt;
                        }

                        .y11 {
                            bottom:559.025460pt;
                        }

                        .y10 {
                            bottom:569.715392pt;
                        }

                        .y12 {
                            bottom:571.276126pt;
                        }

                        .ya {
                            bottom:590.601525pt;
                        }

                        .y6 {
                            bottom:608.035042pt;
                        }

                        .y5 {
                            bottom:621.387656pt;
                        }

                        .y4 {
                            bottom:635.475922pt;
                        }

                        .y3 {
                            bottom:649.564188pt;
                        }

                        .yd {
                            bottom:652.113040pt;
                        }

                        .y2 {
                            bottom:663.652454pt;
                        }

                        .yb {
                            bottom:664.364635pt;
                        }

                        .y7 {
                            bottom:676.616229pt;
                        }

                        .h5 {
                            height:11.639015pt;
                        }

                        .h7 {
                            height:15.761009pt;
                        }

                        .h8 {
                            height:17.512232pt;
                        }

                        .h4 {
                            height:19.263455pt;
                        }

                        .h6 {
                            height:21.014679pt;
                        }

                        .h3 {
                            height:23.005411pt;
                        }

                        .h2 {
                            height:674.450286pt;
                        }

                        .h0 {
                            height:816.000000pt;
                        }

                        .h1 {
                            height:816.666667pt;
                        }

                        .w7 {
                            width:32.466726pt;
                        }

                        .w5 {
                            width:68.608930pt;
                        }

                        .w6 {
                            width:77.797626pt;
                        }

                        .w4 {
                            width:114.552410pt;
                        }

                        .w3 {
                            width:155.595252pt;
                        }

                        .w2 {
                            width:904.167686pt;
                        }

                        .w0 {
                            width:1056.000000pt;
                        }

                        .w1 {
                            width:1056.666667pt;
                        }

                        .x0 {
                            left:0.000000pt;
                        }

                        .x8 {
                            left:1.837781pt;
                        }

                        .xa {
                            left:6.125815pt;
                        }

                        .x6 {
                            left:42.905730pt;
                        }

                        .x15 {
                            left:58.806396pt;
                        }

                        .x1c {
                            left:61.256530pt;
                        }

                        .x1 {
                            left:75.916134pt;
                        }

                        .x16 {
                            left:98.007917pt;
                        }

                        .x17 {
                            left:115.771384pt;
                        }

                        .x18 {
                            left:199.687225pt;
                        }

                        .xe {
                            left:271.964933pt;
                        }

                        .xf {
                            left:282.990533pt;
                        }

                        .xd {
                            left:284.215600pt;
                        }

                        .x5 {
                            left:328.346250pt;
                        }

                        .x2 {
                            left:374.898781pt;
                        }

                        .x3 {
                            left:382.861714pt;
                        }

                        .x4 {
                            left:392.049713pt;
                        }

                        .x11 {
                            left:448.984003pt;
                        }

                        .x10 {
                            left:455.721870pt;
                        }

                        .xc {
                            left:458.783924pt;
                        }

                        .x7 {
                            left:532.900618pt;
                        }

                        .x1e {
                            left:595.376407pt;
                        }

                        .x1d {
                            left:613.139873pt;
                        }

                        .x12 {
                            left:667.042194pt;
                        }

                        .x14 {
                            left:671.329927pt;
                        }

                        .x13 {
                            left:682.968060pt;
                        }

                        .x9 {
                            left:689.108450pt;
                        }

                        .x1b {
                            left:696.443181pt;
                        }

                        .x19 {
                            left:711.756515pt;
                        }

                        .x1a {
                            left:771.171023pt;
                        }

                        .xb {
                            left:834.902426pt;
                        }
                    }
    </style>
    <script>
        /*
                         Copyright 2012 Mozilla Foundation 
                         Copyright 2013 Lu Wang <coolwanglu@gmail.com>
                         Apachine License Version 2.0 
                        */
        (function() {
            function b(a, b, e, f) {
                var c = (a.className || "").split(/\s+/g);
                "" === c[0] && c.shift();
                var d = c.indexOf(b);
                0 > d && e && c.push(b);
                0 <= d && f && c.splice(d, 1);
                a.className = c.join(" ");
                return 0 <= d
            }
            if (!("classList" in document.createElement("div"))) {
                var e = {
                    add: function(a) {
                        b(this.element, a, !0, !1)
                    },
                    contains: function(a) {
                        return b(this.element, a, !1, !1)
                    },
                    remove: function(a) {
                        b(this.element, a, !1, !0)
                    },
                    toggle: function(a) {
                        b(this.element, a, !0, !0)
                    }
                };
                Object.defineProperty(HTMLElement.prototype, "classList", {
                    get: function() {
                        if (this._classList) return this._classList;
                        var a = Object.create(e, {
                            element: {
                                value: this,
                                writable: !1,
                                enumerable: !0
                            }
                        });
                        Object.defineProperty(this, "_classList", {
                            value: a,
                            writable: !1,
                            enumerable: !1
                        });
                        return a
                    },
                    enumerable: !0
                })
            }
        })();
    </script>
    <script>
        (function() {
            /*
             pdf2htmlEX.js: Core UI functions for pdf2htmlEX 
             Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com> and other contributors 
             https://github.com/pdf2htmlEX/pdf2htmlEX/blob/master/share/LICENSE 
            */
            var pdf2htmlEX = window.pdf2htmlEX = window.pdf2htmlEX || {},
                CSS_CLASS_NAMES = {
                    page_frame: "pf",
                    page_content_box: "pc",
                    page_data: "pi",
                    background_image: "bi",
                    link: "l",
                    input_radio: "ir",
                    __dummy__: "no comma"
                },
                DEFAULT_CONFIG = {
                    container_id: "page-container",
                    sidebar_id: "sidebar",
                    outline_id: "outline",
                    loading_indicator_cls: "loading-indicator",
                    preload_pages: 3,
                    render_timeout: 100,
                    scale_step: 0.9,
                    key_handler: !0,
                    hashchange_handler: !0,
                    view_history_handler: !0,
                    __dummy__: "no comma"
                },
                EPS = 1E-6;

            function invert(a) {
                var b = a[0] * a[3] - a[1] * a[2];
                return [a[3] / b, -a[1] / b, -a[2] / b, a[0] / b, (a[2] * a[5] - a[3] * a[4]) / b, (a[1] * a[4] - a[0] *
                    a[5]) / b]
            }

            function transform(a, b) {
                return [a[0] * b[0] + a[2] * b[1] + a[4], a[1] * b[0] + a[3] * b[1] + a[5]]
            }

            function get_page_number(a) {
                return parseInt(a.getAttribute("data-page-no"), 16)
            }

            function disable_dragstart(a) {
                for (var b = 0, c = a.length; b < c; ++b) a[b].addEventListener("dragstart", function() {
                    return !1
                }, !1)
            }

            function clone_and_extend_objs(a) {
                for (var b = {}, c = 0, e = arguments.length; c < e; ++c) {
                    var h = arguments[c],
                        d;
                    for (d in h) h.hasOwnProperty(d) && (b[d] = h[d])
                }
                return b
            }

            function Page(a) {
                if (a) {
                    this.shown = this.loaded = !1;
                    this.page = a;
                    this.num = get_page_number(a);
                    this.original_height = a.clientHeight;
                    this.original_width = a.clientWidth;
                    var b = a.getElementsByClassName(CSS_CLASS_NAMES.page_content_box)[0];
                    b && (this.content_box = b, this.original_scale = this.cur_scale = this.original_height / b
                        .clientHeight, this.page_data = JSON.parse(a.getElementsByClassName(CSS_CLASS_NAMES
                            .page_data)[0].getAttribute("data-data")), this.ctm = this.page_data.ctm, this.ictm =
                        invert(this.ctm), this.loaded = !0)
                }
            }
            Page.prototype = {
                hide: function() {
                    this.loaded && this.shown && (this.content_box.classList.remove("opened"), this.shown = !1)
                },
                show: function() {
                    this.loaded && !this.shown && (this.content_box.classList.add("opened"), this.shown = !0)
                },
                rescale: function(a) {
                    this.cur_scale = 0 === a ? this.original_scale : a;
                    this.loaded && (a = this.content_box.style, a.msTransform = a.webkitTransform = a
                        .transform = "scale(" + this.cur_scale.toFixed(3) + ")");
                    a = this.page.style;
                    a.height = this.original_height * this.cur_scale + "px";
                    a.width = this.original_width * this.cur_scale +
                        "px"
                },
                view_position: function() {
                    var a = this.page,
                        b = a.parentNode;
                    return [b.scrollLeft - a.offsetLeft - a.clientLeft, b.scrollTop - a.offsetTop - a.clientTop]
                },
                height: function() {
                    return this.page.clientHeight
                },
                width: function() {
                    return this.page.clientWidth
                }
            };

            function Viewer(a) {
                this.config = clone_and_extend_objs(DEFAULT_CONFIG, 0 < arguments.length ? a : {});
                this.pages_loading = [];
                this.init_before_loading_content();
                var b = this;
                document.addEventListener("DOMContentLoaded", function() {
                    b.init_after_loading_content()
                }, !1)
            }
            Viewer.prototype = {
                scale: 1,
                cur_page_idx: 0,
                first_page_idx: 0,
                init_before_loading_content: function() {
                    this.pre_hide_pages()
                },
                initialize_radio_button: function() {
                    for (var a = document.getElementsByClassName(CSS_CLASS_NAMES.input_radio), b = 0; b < a
                        .length; b++) a[b].addEventListener("click", function() {
                        this.classList.toggle("checked")
                    })
                },
                init_after_loading_content: function() {
                    this.sidebar = document.getElementById(this.config.sidebar_id);
                    this.outline = document.getElementById(this.config.outline_id);
                    this.container = document.getElementById(this.config.container_id);
                    this.loading_indicator = document.getElementsByClassName(this.config.loading_indicator_cls)[
                        0];
                    for (var a = !0, b = this.outline.childNodes, c = 0, e = b.length; c < e; ++c)
                        if ("ul" === b[c].nodeName.toLowerCase()) {
                            a = !1;
                            break
                        } a || this.sidebar.classList.add("opened");
                    this.find_pages();
                    if (0 != this.pages.length) {
                        disable_dragstart(document.getElementsByClassName(CSS_CLASS_NAMES.background_image));
                        this.config.key_handler && this.register_key_handler();
                        var h = this;
                        this.config.hashchange_handler && window.addEventListener("hashchange",
                            function(a) {
                                h.navigate_to_dest(document.location.hash.substring(1))
                            }, !1);
                        this.config.view_history_handler && window.addEventListener("popstate", function(a) {
                            a.state && h.navigate_to_dest(a.state)
                        }, !1);
                        this.container.addEventListener("scroll", function() {
                            h.update_page_idx();
                            h.schedule_render(!0)
                        }, !1);
                        [this.container, this.outline].forEach(function(a) {
                            a.addEventListener("click", h.link_handler.bind(h), !1)
                        });
                        this.initialize_radio_button();
                        this.render()
                    }
                },
                find_pages: function() {
                    for (var a = [], b = {}, c = this.container.childNodes,
                            e = 0, h = c.length; e < h; ++e) {
                        var d = c[e];
                        d.nodeType === Node.ELEMENT_NODE && d.classList.contains(CSS_CLASS_NAMES.page_frame) &&
                            (d = new Page(d), a.push(d), b[d.num] = a.length - 1)
                    }
                    this.pages = a;
                    this.page_map = b
                },
                load_page: function(a, b, c) {
                    var e = this.pages;
                    if (!(a >= e.length || (e = e[a], e.loaded || this.pages_loading[a]))) {
                        var e = e.page,
                            h = e.getAttribute("data-page-url");
                        if (h) {
                            this.pages_loading[a] = !0;
                            var d = e.getElementsByClassName(this.config.loading_indicator_cls)[0];
                            "undefined" === typeof d && (d = this.loading_indicator.cloneNode(!0),
                                d.classList.add("active"), e.appendChild(d));
                            var f = this,
                                g = new XMLHttpRequest;
                            g.open("GET", h, !0);
                            g.onload = function() {
                                if (200 === g.status || 0 === g.status) {
                                    var b = document.createElement("div");
                                    b.innerHTML = g.responseText;
                                    for (var d = null, b = b.childNodes, e = 0, h = b.length; e < h; ++e) {
                                        var p = b[e];
                                        if (p.nodeType === Node.ELEMENT_NODE && p.classList.contains(
                                                CSS_CLASS_NAMES.page_frame)) {
                                            d = p;
                                            break
                                        }
                                    }
                                    b = f.pages[a];
                                    f.container.replaceChild(d, b.page);
                                    b = new Page(d);
                                    f.pages[a] = b;
                                    b.hide();
                                    b.rescale(f.scale);
                                    disable_dragstart(d.getElementsByClassName(CSS_CLASS_NAMES
                                        .background_image));
                                    f.schedule_render(!1);
                                    c && c(b)
                                }
                                delete f.pages_loading[a]
                            };
                            g.send(null)
                        }
                        void 0 === b && (b = this.config.preload_pages);
                        0 < --b && (f = this, setTimeout(function() {
                            f.load_page(a + 1, b)
                        }, 0))
                    }
                },
                pre_hide_pages: function() {
                    var a = "@media screen{." + CSS_CLASS_NAMES.page_content_box + "{display:none;}}",
                        b = document.createElement("style");
                    b.styleSheet ? b.styleSheet.cssText = a : b.appendChild(document.createTextNode(a));
                    document.head.appendChild(b)
                },
                render: function() {
                    for (var a = this.container, b = a.scrollTop, c = a.clientHeight, a = b - c, b =
                            b + c + c, c = this.pages, e = 0, h = c.length; e < h; ++e) {
                        var d = c[e],
                            f = d.page,
                            g = f.offsetTop + f.clientTop,
                            f = g + f.clientHeight;
                        g <= b && f >= a ? d.loaded ? d.show() : this.load_page(e) : d.hide()
                    }
                },
                update_page_idx: function() {
                    var a = this.pages,
                        b = a.length;
                    if (!(2 > b)) {
                        for (var c = this.container, e = c.scrollTop, c = e + c.clientHeight, h = -1, d = b, f =
                                d - h; 1 < f;) {
                            var g = h + Math.floor(f / 2),
                                f = a[g].page;
                            f.offsetTop + f.clientTop + f.clientHeight >= e ? d = g : h = g;
                            f = d - h
                        }
                        this.first_page_idx = d;
                        for (var g = h = this.cur_page_idx, k = 0; d < b; ++d) {
                            var f = a[d].page,
                                l = f.offsetTop + f.clientTop,
                                f = f.clientHeight;
                            if (l > c) break;
                            f = (Math.min(c, l + f) - Math.max(e, l)) / f;
                            if (d === h && Math.abs(f - 1) <= EPS) {
                                g = h;
                                break
                            }
                            f > k && (k = f, g = d)
                        }
                        this.cur_page_idx = g
                    }
                },
                schedule_render: function(a) {
                    if (void 0 !== this.render_timer) {
                        if (!a) return;
                        clearTimeout(this.render_timer)
                    }
                    var b = this;
                    this.render_timer = setTimeout(function() {
                        delete b.render_timer;
                        b.render()
                    }, this.config.render_timeout)
                },
                register_key_handler: function() {
                    var a = this;
                    window.addEventListener("DOMMouseScroll", function(b) {
                        if (b.ctrlKey) {
                            b.preventDefault();
                            var c = a.container,
                                e = c.getBoundingClientRect(),
                                c = [b.clientX - e.left - c.clientLeft, b.clientY - e.top - c
                                    .clientTop
                                ];
                            a.rescale(Math.pow(a.config.scale_step, b.detail), !0, c)
                        }
                    }, !1);
                    window.addEventListener("keydown", function(b) {
                        var c = !1,
                            e = b.ctrlKey || b.metaKey,
                            h = b.altKey;
                        switch (b.keyCode) {
                            case 61:
                            case 107:
                            case 187:
                                e && (a.rescale(1 / a.config.scale_step, !0), c = !0);
                                break;
                            case 173:
                            case 109:
                            case 189:
                                e && (a.rescale(a.config.scale_step, !0), c = !0);
                                break;
                            case 48:
                                e && (a.rescale(0, !1), c = !0);
                                break;
                            case 33:
                                h ? a.scroll_to(a.cur_page_idx - 1) : a.container.scrollTop -=
                                    a.container.clientHeight;
                                c = !0;
                                break;
                            case 34:
                                h ? a.scroll_to(a.cur_page_idx + 1) : a.container.scrollTop += a
                                    .container.clientHeight;
                                c = !0;
                                break;
                            case 35:
                                a.container.scrollTop = a.container.scrollHeight;
                                c = !0;
                                break;
                            case 36:
                                a.container.scrollTop = 0, c = !0
                        }
                        c && b.preventDefault()
                    }, !1)
                },
                rescale: function(a, b, c) {
                    var e = this.scale;
                    this.scale = a = 0 === a ? 1 : b ? e * a : a;
                    c || (c = [0, 0]);
                    b = this.container;
                    c[0] += b.scrollLeft;
                    c[1] += b.scrollTop;
                    for (var h = this.pages, d = h.length, f = this.first_page_idx; f < d; ++f) {
                        var g = h[f].page;
                        if (g.offsetTop + g.clientTop >=
                            c[1]) break
                    }
                    g = f - 1;
                    0 > g && (g = 0);
                    var g = h[g].page,
                        k = g.clientWidth,
                        f = g.clientHeight,
                        l = g.offsetLeft + g.clientLeft,
                        m = c[0] - l;
                    0 > m ? m = 0 : m > k && (m = k);
                    k = g.offsetTop + g.clientTop;
                    c = c[1] - k;
                    0 > c ? c = 0 : c > f && (c = f);
                    for (f = 0; f < d; ++f) h[f].rescale(a);
                    b.scrollLeft += m / e * a + g.offsetLeft + g.clientLeft - m - l;
                    b.scrollTop += c / e * a + g.offsetTop + g.clientTop - c - k;
                    this.schedule_render(!0)
                },
                fit_width: function() {
                    var a = this.cur_page_idx;
                    this.rescale(this.container.clientWidth / this.pages[a].width(), !0);
                    this.scroll_to(a)
                },
                fit_height: function() {
                    var a = this.cur_page_idx;
                    this.rescale(this.container.clientHeight / this.pages[a].height(), !0);
                    this.scroll_to(a)
                },
                get_containing_page: function(a) {
                    for (; a;) {
                        if (a.nodeType === Node.ELEMENT_NODE && a.classList.contains(CSS_CLASS_NAMES
                                .page_frame)) {
                            a = get_page_number(a);
                            var b = this.page_map;
                            return a in b ? this.pages[b[a]] : null
                        }
                        a = a.parentNode
                    }
                    return null
                },
                link_handler: function(a) {
                    var b = a.target,
                        c = b.getAttribute("data-dest-detail");
                    if (c) {
                        if (this.config.view_history_handler) try {
                            var e = this.get_current_view_hash();
                            window.history.replaceState(e,
                                "", "#" + e);
                            window.history.pushState(c, "", "#" + c)
                        } catch (h) {}
                        this.navigate_to_dest(c, this.get_containing_page(b));
                        a.preventDefault()
                    }
                },
                navigate_to_dest: function(a, b) {
                    try {
                        var c = JSON.parse(a)
                    } catch (e) {
                        return
                    }
                    if (c instanceof Array) {
                        var h = c[0],
                            d = this.page_map;
                        if (h in d) {
                            for (var f = d[h], h = this.pages[f], d = 2, g = c.length; d < g; ++d) {
                                var k = c[d];
                                if (null !== k && "number" !== typeof k) return
                            }
                            for (; 6 > c.length;) c.push(null);
                            var g = b || this.pages[this.cur_page_idx],
                                d = g.view_position(),
                                d = transform(g.ictm, [d[0], g.height() - d[1]]),
                                g = this.scale,
                                l = [0, 0],
                                m = !0,
                                k = !1,
                                n = this.scale;
                            switch (c[1]) {
                                case "XYZ":
                                    l = [null === c[2] ? d[0] : c[2] * n, null === c[3] ? d[1] : c[3] * n];
                                    g = c[4];
                                    if (null === g || 0 === g) g = this.scale;
                                    k = !0;
                                    break;
                                case "Fit":
                                case "FitB":
                                    l = [0, 0];
                                    k = !0;
                                    break;
                                case "FitH":
                                case "FitBH":
                                    l = [0, null === c[2] ? d[1] : c[2] * n];
                                    k = !0;
                                    break;
                                case "FitV":
                                case "FitBV":
                                    l = [null === c[2] ? d[0] : c[2] * n, 0];
                                    k = !0;
                                    break;
                                case "FitR":
                                    l = [c[2] * n, c[5] * n], m = !1, k = !0
                            }
                            if (k) {
                                this.rescale(g, !1);
                                var p = this,
                                    c = function(a) {
                                        l = transform(a.ctm, l);
                                        m && (l[1] = a.height() - l[1]);
                                        p.scroll_to(f, l)
                                    };
                                h.loaded ?
                                    c(h) : (this.load_page(f, void 0, c), this.scroll_to(f))
                            }
                        }
                    }
                },
                scroll_to: function(a, b) {
                    var c = this.pages;
                    if (!(0 > a || a >= c.length)) {
                        c = c[a].view_position();
                        void 0 === b && (b = [0, 0]);
                        var e = this.container;
                        e.scrollLeft += b[0] - c[0];
                        e.scrollTop += b[1] - c[1]
                    }
                },
                get_current_view_hash: function() {
                    var a = [],
                        b = this.pages[this.cur_page_idx];
                    a.push(b.num);
                    a.push("XYZ");
                    var c = b.view_position(),
                        c = transform(b.ictm, [c[0], b.height() - c[1]]);
                    a.push(c[0] / this.scale);
                    a.push(c[1] / this.scale);
                    a.push(this.scale);
                    return JSON.stringify(a)
                }
            };
            pdf2htmlEX.Viewer = Viewer;
        })();
    </script>
    <script>
        try {
            pdf2htmlEX.defaultViewer = new pdf2htmlEX.Viewer({});
        } catch (e) {}
    </script>
    <title></title>
</head>

<body>
    <div id="sidebar">
        <div id="outline">
        </div>
    </div>
    <div id="page-container">
        <div id="pf1" class="pf w0 h0" data-page-no="1">
            <div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt=""
                    src="data:image/png;base64,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" />
                <div class="c x1 y1 w2 h2">
                    <div class="t m0 x2 h3 y2 ff1 fs0 fc0 sc0 ls0 ws0">SECRET<span class="_ _0"></span>ARIA<span
                            class="_ _1"></span> DE SALUD DE MICHOACÁN </div>
                    <div class="t m0 x3 h3 y3 ff1 fs0 fc0 sc0 ls0 ws0">DIRECCIÓN DE SERVICIOS DE SALUD </div>
                    <div class="t m0 x4 h3 y4 ff1 fs0 fc0 sc0 ls0 ws0">DEP<span class="_ _0"></span>ART<span
                            class="_ _0"></span>AMENTO DE ENSEÑANZA<span class="_ _0"></span> </div>
                    <div class="t m0 x5 h3 y5 ff1 fs0 fc0 sc0 ls0 ws0">CART<span class="_ _0"></span>A<span
                            class="_ _1"></span> DESCRIPTIV<span class="_ _0"></span>A<span class="_ _1"></span>
                        P<span class="_ _0"></span>ARA<span class="_ _1"></span> <span
                            class="_ _1"></span>ACTIVIDADES DE CAP<span class="_ _0"></span>ACIT<span
                            class="_ _0"></span>ACIÓN </div>
                    <div class="t m0 x6 h4 y6 ff2 fs1 fc0 sc0 ls0 ws0">Departamento: Labor<span
                            class="_ _0"></span>atorio Estatal de Salud Pública</div>
                </div>
                <div class="c x7 y7 w3 h5">
                    <div class="t m0 x8 h6 y8 ff2 fs2 fc0 sc0 ls0 ws0">Personal al que v<span class="_ _0"></span>a
                        dirigido:</div>
                </div>
                <div class="c x1 y9 w2 h2">
                    <div class="t m0 x6 h4 ya ff2 fs3 fc0 sc0 ls0 ws0">Nombre de la capacitación:</div>
                </div>
                <div class="c x7 yb w4 h5">
                    <div class="t m0 x8 h6 yc ff2 fs2 fc0 sc0 ls0 ws0">N° de Asistent<span class="_ _0"></span>es
                        esperados:</div>
                </div>
                <div class="c x7 yd w5 h5">
                    <div class="t m0 x8 h6 ye ff2 fs2 fc0 sc0 ls0 ws0">Horas teóric<span class="_ _1"></span>as:
                    </div>
                </div>
                <div class="c x9 yd w6 h5">
                    <div class="t m0 xa h6 ye ff2 fs2 fc0 sc0 ls0 ws0">Horas pr<span class="_ _0"></span>ácticas:
                    </div>
                </div>
                <div class="c xb yd w7 h5">
                    <div class="t m0 x8 h4 yf ff2 fs3 fc0 sc0 ls0 ws0">Créditos:<span class="fc1 sc0"> </span></div>
                </div>
                <div class="c x1 y9 w2 h2">
                    <div class="t m0 x6 h4 y10 ff2 fs3 fc0 sc0 ls0 ws0">Modalidad a realizar: (congr<span
                            class="_ _1"></span>eso, seminario, diplomado<span class="_ _1"></span>, </div>
                    <div class="t m0 x6 h4 y11 ff2 fs3 fc0 sc0 ls0 ws0">curso, sesión, taller<span
                            class="_ _0"></span>, cur<span class="_ _1"></span>so-taller<span
                            class="_ _0"></span>, otro especificar) </div>
                    <div class="t m0 xc h4 y12 ff2 fs3 fc0 sc0 ls0 ws0">Sede:</div>
                    <div class="t m0 xc h4 y11 ff2 fs3 fc0 sc0 ls0 ws0">Auditorio:<span class="_ _2"> </span>Sala de
                        usos multiples:<span class="_ _3"> </span>Sala de Dirección:</div>
                    <div class="t m0 x6 h4 y13 ff2 fs3 fc0 sc0 ls0 ws0">Tipo de capacitación: Presencial:<span
                            class="_ _4"> </span>Virtual:<span class="_ _5"> </span>Mixto: <span class="_ _6">
                        </span>Otro especificar: </div>
                    <div class="t m0 x6 h4 y14 ff2 fs3 fc0 sc0 ls0 ws0">Responsable del event<span
                            class="_ _0"></span>o: <span class="_ _7"> </span>Fecha de inicio:<span class="_ _8">
                        </span>2/21/2023</div>
                    <div class="t m0 x6 h4 y15 ff2 fs3 fc0 sc0 ls0 ws0">Coordinación o área: <span class="_ _9">
                        </span>Fecha de término:<span class="_ _a"> </span>2/21/2023</div>
                    <div class="t m0 x6 h4 y16 ff2 fs3 fc0 sc0 ls0 ws0">Objetivo gener<span class="_ _0"></span>al del
                        evento:</div>
                    <div class="t m0 x6 h4 y17 ff2 fs3 fc0 sc0 ls0 ws0">Forma de evaluación: </div>
                    <div class="t m0 xd h4 y18 ff2 fs3 fc0 sc0 ls0 ws0">Porcen<span class="_ _1"></span>taje de </div>
                    <div class="t m0 xe h4 y19 ff2 fs3 fc0 sc0 ls0 ws0">asistencia requerido </div>
                    <div class="t m0 xe h4 y1a ff2 fs3 fc0 sc0 ls0 ws0">para acredit<span class="_ _1"></span>ar curso
                    </div>
                    <div class="t m0 xf h4 y1b ff2 fs3 fc0 sc0 ls0 ws0">del 70 al 100% </div>
                    <div class="t m0 xc h4 y1c ff2 fs3 fc0 sc0 ls0 ws0">Calificación requerida para </div>
                    <div class="t m0 x10 h4 y1d ff2 fs3 fc0 sc0 ls0 ws0">acreditar curso (cues<span
                            class="_ _0"></span>tionario </div>
                    <div class="t m0 x11 h4 y1e ff2 fs3 fc0 sc0 ls0 ws0">cuando aplique) del 80% al 100%</div>
                    <div class="t m0 x12 h4 y18 ff2 fs3 fc0 sc0 ls0 ws0">Requiere ev<span class="_ _0"></span>aluación
                        de </div>
                    <div class="t m0 x13 h4 y19 ff2 fs3 fc0 sc0 ls0 ws0">la capacitación </div>
                    <div class="t m0 x12 h4 y1a ff2 fs3 fc0 sc0 ls0 ws0">adquidida (antes de los </div>
                    <div class="t m0 x14 h4 y1b ff2 fs3 fc0 sc0 ls0 ws0">30 días hábiles) Sí/No</div>
                    <div class="t m0 x15 h4 y1f ff2 fs3 fc0 sc0 ls0 ws0">N°</div>
                    <div class="t m0 x16 h4 y20 ff2 fs3 fc0 sc0 ls0 ws0">Fecha y hora del </div>
                    <div class="t m0 x17 h4 y21 ff2 fs3 fc0 sc0 ls0 ws0">evento</div>
                    <div class="t m0 x18 h4 y1f ff2 fs3 fc0 sc0 ls0 ws0">CONTENIDO TEMÁ<span
                            class="_ _0"></span>TICO<span class="_ _b"> </span>OBJETIVOS ESPE<span
                            class="_ _1"></span>CÍFICOS<span class="_ _c"> </span>TECNICA DIDÁ<span
                            class="_ _0"></span>CTICA<span class="_ _d"> </span>RESPONSABLE ó PONENTE </div>
                    <div class="t m0 x19 h4 y22 ff2 fs3 fc0 sc0 ls0 ws0">HORAS</div>
                    <div class="t m0 x1a h7 y23 ff2 fs4 fc0 sc0 ls0 ws0">REFERENCIA BIBLIOGRAFICA/GPC/NOM</div>
                    <div class="t m0 x1b h7 y24 ff2 fs4 fc0 sc0 ls0 ws0">T<span class="_ _0"></span>eóricas<span
                            class="_ _e"> </span>Prácticas</div>
                    <div class="t m0 x1c h8 y25 ff3 fs5 fc0 sc0 ls0 ws0">1</div>
                    <div class="t m0 x1c h8 y26 ff3 fs5 fc0 sc0 ls0 ws0">2</div>
                    <div class="t m0 x1c h8 y27 ff3 fs5 fc0 sc0 ls0 ws0">3</div>
                    <div class="t m0 x1c h8 y28 ff3 fs5 fc0 sc0 ls0 ws0">4</div>
                    <div class="t m0 x1c h8 y29 ff3 fs5 fc0 sc0 ls0 ws0">5</div>
                    <div class="t m0 x1c h8 y2a ff3 fs5 fc0 sc0 ls0 ws0">6</div>
                    <div class="t m0 x1c h8 y2b ff3 fs5 fc0 sc0 ls0 ws0">7</div>
                    <div class="t m0 x6 h4 y2c ff3 fs3 fc0 sc0 ls0 ws0">GPC= GUÍA DE PRÁCTICA CLÍNICA </div>
                    <div class="t m0 x6 h4 y2d ff3 fs3 fc0 sc0 ls0 ws0">NOM= NORMA OFICIAL MEXICANA </div>
                    <div class="t m0 x1d h6 y2e ff2 fs2 fc0 sc0 ls0 ws0">Dr<span class="_ _0"></span>. Max R<span
                            class="_ _1"></span>odrigo Rodrígue<span class="_ _1"></span>z Ibarra </div>
                    <div class="t m0 x1e h6 y2f ff2 fs2 fc0 sc0 ls0 ws0">Coordinador de enseñanza e In<span
                            class="_ _1"></span>vestig<span class="_ _1"></span>ación </div>
                </div><a class="l" href="https://ibctr.sandia.gov/risk_management/risk-mgt-bioram.html">
                    <div class="d m1"
                        style="border-style:none;position:absolute;left:0.000000px;bottom:0.000000px;width:0.000000px;height:0.000000px;background-color:rgba(255,255,255,0.000001);">
                    </div>
                </a><a class="l" href="https://ibctr.sandia.gov/risk_management/risk-mgt-bioram.html">
                    <div class="d m1"
                        style="border-style:none;position:absolute;left:0.000000px;bottom:0.000000px;width:0.000000px;height:0.000000px;background-color:rgba(255,255,255,0.000001);">
                    </div>
                </a><a class="l" href="https://ibctr.sandia.gov/risk_management/risk-mgt-bioram.html">
                    <div class="d m1"
                        style="border-style:none;position:absolute;left:0.000000px;bottom:0.000000px;width:0.000000px;height:0.000000px;background-color:rgba(255,255,255,0.000001);">
                    </div>
                </a>
            </div>
            <div class="pi" data-data='{"ctm":[1.500000,0.000000,0.000000,1.500000,0.000000,0.000000]}'></div>
        </div>
    </div>
    <div class="loading-indicator">
        <img alt=""
            src="data:image/png;base64,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" />
    </div>
</body>

</html>
