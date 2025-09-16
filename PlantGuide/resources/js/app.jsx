import React from 'react';
import ReactDOM from 'react-dom/client';
import axios from 'axios';

function App() {
    const [selectedContainer, setSelectedContainer] = React.useState(null);
    const [showModal, setShowModal] = React.useState(false);
    // Track window width for responsive rendering
    const [isMobile, setIsMobile] = React.useState(window.innerWidth <= 600);
    React.useEffect(() => {
        const handleResize = () => setIsMobile(window.innerWidth <= 600);
        window.addEventListener('resize', handleResize);
        return () => window.removeEventListener('resize', handleResize);
    }, []);
    const rows = 3;
    const cols = 6;
    const boxSize = 100; // px, for visual demo
    const [activeBoxes, setActiveBoxes] = React.useState([]);
    const [boxes, setBoxes] = React.useState([]);
    const [pots, setPots] = React.useState([]);
    const [strawberryBoxes, setStrawberryBoxes] = React.useState([]);
    const [loading, setLoading] = React.useState(true);
    const [bottomText, setBottomText] = React.useState("");
    const [plants, setPlants] = React.useState([]);

    React.useEffect(() => {
        axios.get('/api/containers').then(res => {
            const containers = res.data;
            const planterBoxes = containers.filter(c => c.type === 'planter_box');
            setBoxes(planterBoxes);
            setPots(containers.filter(c => c.type === 'pot'));
            setStrawberryBoxes(containers.filter(c => c.type === 'strawberry_box'));
            setActiveBoxes(planterBoxes.filter(box => box.status === 'Built'));
            setLoading(false);
        });
        axios.get('/api/plants').then(res => {
            setPlants(res.data);
        });
    }, []);

    if (loading) return <div>Loading...</div>;

    const handleContainerClick = (container) => {
        setSelectedContainer(container);
        setShowModal(true);
    };

    const closeModal = () => {
        setShowModal(false);
        setSelectedContainer(null);
    };

    return (
    <React.Fragment>
            <style>{`
                @media (max-width: 900px) {
                    .responsive-grid {
                        grid-template-columns: repeat(2, 1fr) 1fr repeat(${cols}, 1fr) !important;
                        gap: 8px !important;
                        padding: 12px !important;
                    }
                    .responsive-box {
                        font-size: 1rem !important;
                        /* height: 60px !important; */
                        /* width: 60px !important; */
                    }
                    .responsive-table th, .responsive-table td {
                        font-size: 0.95rem !important;
                        padding: 8px !important;
                        word-break: break-word !important;
                    }
                    .responsive-notes, .responsive-links {
                        font-size: 0.95rem !important;
                        padding: 8px !important;
                    }
                }
                @media (max-width: 600px) {
                    .responsive-grid {
                        grid-template-columns: repeat(${cols + 3}, 1fr) !important;
                        /* gap: 4px !important; */
                        /* padding: 4px !important; */
                    }
                    .responsive-box {
                        font-size: 0.8rem !important;
                        height: 60px !important;
                        width: 60px !important;
                    }
                    .greenhouse-mobile, .strawberry-mobile {
                        width: 200px !important;
                        min-width: 200px !important;
                        max-width: 200px !important;
                        height: 332px !important;
                        min-height: 332px !important;
                        max-height: 332px !important;
                    }
                    .responsive-table th, .responsive-table td {
                        font-size: 0.8rem !important;
                        padding: 4px !important;
                        word-break: break-word !important;
                    }
                    .responsive-notes, .responsive-links {
                        font-size: 0.8rem !important;
                        padding: 4px !important;
                    }
                }
            `}</style>
            {/* Second grid (no planter boxes) only on mobile */}
            {isMobile && (
                <div style={{ display: 'flex', justifyContent: 'center', width: '100%' }}>
                    <div
                        className="responsive-grid"
                        style={{
                            display: 'grid',
                            gridTemplateColumns: `${boxSize * 1.5}px ${boxSize}px`,
                            gap: '16px',
                            padding: '32px',
                            alignItems: 'stretch',
                            margin: '0 auto',
                            maxWidth: `${boxSize * 2.5 + 32}px`,
                        }}
                    >
                    {/* Greenhouse */}
                    <div
                        style={{
                            border: '2px solid #388e3c',
                            background: '#c8e6c9',
                            display: 'flex',
                            alignItems: 'flex-start',
                            justifyContent: 'flex-start',
                            fontWeight: 'bold',
                            fontSize: '1.2rem',
                            boxSizing: 'border-box',
                            position: 'relative',
                            borderRadius: '8px',
                            width: `${boxSize * 2}px`,
                            minWidth: `${boxSize * 2}px`,
                            maxWidth: `${boxSize * 2}px`,
                            height: `${boxSize * rows + 32}px`,
                            minHeight: `${boxSize * rows + 32}px`,
                            maxHeight: `${boxSize * rows + 32}px`,
                        }}
                    >
                        <span style={{
                            position: 'absolute',
                            top: '10px',
                            left: '50%',
                            transform: 'translateX(-50%)',
                            zIndex: 2,
                            fontWeight: 'bold',
                            fontSize: '1.4rem',
                            color: '#fff',
                            textShadow: '0 2px 8px #388e3c, 0 1px 0 #333',
                            padding: '6px 18px',
                            borderRadius: '8px',
                            whiteSpace: 'nowrap',
                            letterSpacing: '1px',
                        }}>Green House</span>
                        {/* Plug Trays Shelf (left sub box) */}
                        <div style={{
                            position: 'absolute',
                            top: 0,
                            left: 0,
                            width: '40%',
                            height: '100%',
                            background: '#a5d6a7',
                            borderRight: '2px solid #388e3c',
                            borderRadius: '12px 0 0 12px',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            fontWeight: 'bold',
                            fontSize: '1rem',
                            color: '#000',
                        }}>
                            Plug Trays Shelf
                        </div>
                        {/* Grow Bags (right sub box) */}
                        <div style={{
                            position: 'absolute',
                            top: 0,
                            right: 0,
                            width: '40%',
                            height: '100%',
                            background: '#b2dfdb',
                            borderLeft: '2px solid #388e3c',
                            borderRadius: '0 12px 12px 0',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            fontWeight: 'bold',
                            fontSize: '1rem',
                            color: '#000',
                        }}>
                            Grow Bags
                        </div>
                    </div>
                    {/* Strawberry Patch */}
                    <div
                        style={{
                            border: '2px solid #d32f2f',
                            background: '#ffcccb',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center',
                            fontWeight: 'bold',
                            fontSize: '1.2rem',
                            boxSizing: 'border-box',
                            borderRadius: '8px',
                        }}
                    >
                        Strawberry Patch
                    </div>
                    {/* Removed empty cell for spacing */}
                </div>
                </div>
            )}
            {/* Original grid below */}
            <div style={{ display: 'flex', justifyContent: 'center', width: '100%' }}>
                <div
                    className="responsive-grid"
                    style={{
                        display: 'grid',
                        gridTemplateColumns: `repeat(2, ${boxSize}px) ${boxSize}px repeat(${cols}, ${boxSize}px)`,
                        gap: '16px',
                        padding: '32px',
                        alignItems: 'stretch',
                    }}
                >
                    {/* Greenhouse and Strawberry Patch only if not mobile */}
                    {!isMobile && (
                        <>
                            {/* Greenhouse */}
                            <div
                                style={{
                                    gridRow: `span ${rows}`,
                                    gridColumn: '1 / span 2',
                                    border: '2px solid #388e3c',
                                    background: '#c8e6c9',
                                    height: boxSize * rows + 32, // 3 boxes + gaps
                                    display: 'flex',
                                    alignItems: 'flex-start',
                                    justifyContent: 'flex-start',
                                    fontWeight: 'bold',
                                    fontSize: '1.2rem',
                                    boxSizing: 'border-box',
                                    position: 'relative',
                                    width: `${boxSize * 2}px`,
                                    minWidth: `${boxSize * 2}px`,
                                    maxWidth: `${boxSize * 2}px`,
                                }}
                            >
                                {/* Green House label at top */}
                                <span style={{
                                    position: 'absolute',
                                    top: '10px',
                                    left: '50%',
                                    transform: 'translateX(-50%)',
                                    zIndex: 2,
                                    fontWeight: 'bold',
                                    fontSize: '1.4rem',
                                    color: '#fff',
                                    textShadow: '0 2px 8px #388e3c, 0 1px 0 #333',
                                    padding: '6px 18px',
                                    borderRadius: '8px',
                                    whiteSpace: 'nowrap',
                                    letterSpacing: '1px',
                                }}>Green House</span>
                                {/* Plug Trays Shelf (left sub box) */}
                                <div style={{
                                    position: 'absolute',
                                    top: 0,
                                    left: 0,
                                    width: '40%',
                                    height: '100%',
                                    background: '#a5d6a7',
                                    borderRight: '2px solid #388e3c',
                                    borderRadius: '12px 0 0 12px',
                                    display: 'flex',
                                    alignItems: 'center',
                                    justifyContent: 'center',
                                    fontWeight: 'bold',
                                    fontSize: '1rem',
                                    color: '#000',
                                }}>
                                    Plug Trays Shelf
                                </div>
                                {/* Grow Bags (right sub box) */}
                                <div style={{
                                    position: 'absolute',
                                    top: 0,
                                    right: 0,
                                    width: '40%',
                                    height: '100%',
                                    background: '#b2dfdb',
                                    borderLeft: '2px solid #388e3c',
                                    borderRadius: '0 12px 12px 0',
                                    display: 'flex',
                                    alignItems: 'center',
                                    justifyContent: 'center',
                                    fontWeight: 'bold',
                                    fontSize: '1rem',
                                    color: '#000',
                                }}>
                                    Grow Bags
                                </div>
                            </div>
                            {/* Strawberry Patch with 12 vertical boxes */}
                            <div
                                style={{
                                    gridRow: `span ${rows}`,
                                    gridColumn: '3',
                                    border: '2px solid #d32f2f',
                                    background: '#ffcccb',
                                    height: boxSize * rows + 32,
                                    display: 'flex',
                                    flexDirection: 'column',
                                    alignItems: 'center',
                                    justifyContent: 'flex-start',
                                    fontWeight: 'bold',
                                    fontSize: '1.2rem',
                                    boxSizing: 'border-box',
                                    padding: '8px 0',
                                    position: 'relative',
                                }}
                            >
                                <span style={{
                                    position: 'absolute',
                                    top: '8px',
                                    left: '50%',
                                    transform: 'translateX(-50%)',
                                    zIndex: 2,
                                    fontWeight: 'bold',
                                    fontSize: '1.1rem',
                                    color: '#d32f2f',
                                    textShadow: '0 1px 4px #fff',
                                    padding: '2px 10px',
                                    borderRadius: '6px',
                                    whiteSpace: 'nowrap',
                                    letterSpacing: '1px',
                                }}>Strawberry Patch</span>
                                <div style={{
                                    display: 'flex',
                                    flexDirection: 'column',
                                    alignItems: 'center',
                                    justifyContent: 'center',
                                    height: `calc(${boxSize * rows + 32}px - 40px)`,
                                    width: '100%',
                                    marginTop: '32px',
                                }}>
                                    {strawberryBoxes.map((box, i) => {
                                        let varietyName = box.varieties && box.varieties.length > 0 ? box.varieties[0].name : 'No Variety';
                                        return (
                                            <div
                                                key={box.id || i}
                                                style={{
                                                    width: '80%',
                                                    height: `calc(100% / 12 - 4px)`,
                                                    minHeight: 0,
                                                    border: '1.5px solid #d32f2f',
                                                    background: '#fff',
                                                    borderRadius: '6px',
                                                    boxSizing: 'border-box',
                                                    display: 'flex',
                                                    alignItems: 'center',
                                                    justifyContent: 'center',
                                                    fontWeight: 'bold',
                                                    fontSize: '0.8rem',
                                                    color: '#d32f2f',
                                                    marginBottom: i < strawberryBoxes.length - 1 ? '2px' : '0',
                                                    cursor: 'pointer',
                                                    wordBreak: 'break-word',
                                                    overflow: 'hidden',
                                                    textOverflow: 'ellipsis',
                                                    whiteSpace: 'nowrap',
                                                }}
                                                onClick={() => handleContainerClick(box)}
                                            >
                                                {varietyName}
                                            </div>
                                        );
                                    })}
                                </div>
                            </div>
                        </>
                    )}
                    {/* Planter Boxes */}
                    {boxes.map((box, i) => {
                        const isActive = activeBoxes.some(active => active.id === box.id);
                        const isUnbuilt = box.status === 'unbuilt';
                        return (
                            <div
                                key={box.id || i}
                                className="responsive-box"
                                style={{
                                    border: isUnbuilt ? '2px dashed #bdbdbd' : '2px solid #4caf50',
                                    background: isUnbuilt ? '#f5f5f5' : (isActive ? '#ffeb3b' : '#e8f5e9'),
                                    color: isUnbuilt ? '#bdbdbd' : '#333',
                                    height: boxSize,
                                    width: boxSize,
                                    display: 'flex',
                                    flexDirection: 'column',
                                    alignItems: 'center',
                                    justifyContent: 'center',
                                    fontWeight: 'bold',
                                    fontSize: '1.2rem',
                                    boxSizing: 'border-box',
                                    gridColumn: `${(i % cols) + 4}`,
                                    gridRow: `${Math.floor(i / cols) + 1}`,
                                    opacity: isUnbuilt ? 0.6 : 1,
                                    overflow: 'visible',
                                    wordBreak: 'break-word',
                                    cursor: 'pointer',
                                }}
                                onClick={() => handleContainerClick(box)}
                            >
                                {isUnbuilt ? 'Unbuilt' : box.name}
                                <div style={{
                                    marginTop: '8px',
                                    width: '80%',
                                    padding: '4px',
                                    textAlign: 'center',
                                    wordBreak: 'normal',
                                    overflowWrap: 'normal',
                                    whiteSpace: 'normal',
                                    lineHeight: '1.1',
                                    overflow: 'visible',
                                    textOverflow: 'clip',
                                    fontSize: 'clamp(0.6rem, 1vw, 1rem)',
                                }}>
                                    {isUnbuilt ? <span style={{ color: '#bdbdbd' }}>No box</span> : (box.plant ? box.plant.name : <span style={{ color: '#aaa' }}>Empty</span>)}
                                </div>
                            </div>
                        );
                    })}
                </div>
            </div>
            {/* Row of Pots Below Grid */}
            <div style={{
                display: 'flex',
                justifyContent: 'center',
                alignItems: 'flex-end',
                gap: '24px',
                margin: '32px 0 0 0',
            }}>
                {pots.map((pot, i) => (
                    <div
                        key={pot.id || i}
                        style={{
                            width: boxSize * 0.7,
                            height: boxSize * 0.7,
                            border: '2px solid #1976d2',
                            background: '#1976d2',
                            borderRadius: '50%',
                            boxSizing: 'border-box',
                            display: 'flex',
                            flexDirection: 'column',
                            alignItems: 'center',
                            justifyContent: 'center',
                            fontWeight: 'bold',
                            fontSize: '1rem',
                            color: '#fff',
                            position: 'relative',
                            cursor: 'pointer',
                        }}
                        onClick={() => handleContainerClick(pot)}
                    >
                        {pot.name || `Pot ${i + 1}`}
                        <div style={{ marginTop: '4px', width: '80%', padding: '2px', fontSize: 'clamp(0.7rem, 1vw + 0.7rem, 1rem)', textAlign: 'center', wordBreak: 'normal', overflowWrap: 'normal', whiteSpace: 'normal', lineHeight: '1.1' }}>
                            {pot.plant ? pot.plant.name : <span style={{ color: '#aaa' }}>Empty</span>}
                        </div>
                    </div>
                ))}
            </div>
            {/* Plant & Variety Table */}
            <div style={{ margin: '40px auto', maxWidth: '600px', width: '100%' }}>
                <table className="responsive-table" style={{ width: '100%', borderCollapse: 'collapse', background: '#fff', borderRadius: '12px', boxShadow: '0 2px 8px rgba(0,0,0,0.07)' }}>
                    <thead>
                        <tr style={{ background: '#e3f2fd' }}>
                            <th style={{ padding: '12px', borderBottom: '2px solid #90caf9', textAlign: 'left' }}>Plant</th>
                            <th style={{ padding: '12px', borderBottom: '2px solid #90caf9', textAlign: 'left' }}>Variety</th>
                        </tr>
                    </thead>
                    <tbody>
                        {plants.map(plant => (
                            plant.varieties && plant.varieties.length > 0 ? (
                                plant.varieties.map((variety, idx) => (
                                    <tr key={plant.id + '-' + variety.id}>
                                        <td style={{ padding: '10px', borderBottom: '1px solid #eee' }}>{idx === 0 ? plant.name : ''}</td>
                                        <td style={{ padding: '10px', borderBottom: '1px solid #eee' }}>
                                            {variety.url ? (
                                                <a href={variety.url} target="_blank" rel="noopener noreferrer" style={{ color: '#1976d2', textDecoration: 'underline' }}>
                                                    {variety.name}
                                                </a>
                                            ) : (
                                                variety.name
                                            )}
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr key={plant.id + '-empty'}>
                                    <td style={{ padding: '10px', borderBottom: '1px solid #eee' }}>{plant.name}</td>
                                    <td style={{ padding: '10px', borderBottom: '1px solid #eee', color: '#aaa' }}>No varieties</td>
                                </tr>
                            )
                        ))}
                    </tbody>
                </table>
            </div>
            <div id="text-notes">
                <div className="responsive-notes" style={{ marginTop: '32px', textAlign: 'center', width: '100%' }}>
                <br />
                need to be acid soil for blueberries (ericaceous compost) (try and use rain water keeps soil ph)
                </div>
                <div id="plant-links" style={{
                    margin: '32px auto',
                    display: 'flex',
                    flexWrap: 'wrap',
                    justifyContent: 'center',
                    gap: '18px',
                    background: '#f5f5f5',
                    borderRadius: '12px',
                    padding: '24px 12px',
                    boxShadow: '0 2px 8px rgba(0,0,0,0.07)'
                }}
                className="responsive-links"
            >
                    <a href="https://www.kingsseedsdirect.com/" style={{
                        color: '#388e3c',
                        fontWeight: 'bold',
                        textDecoration: 'none',
                        padding: '8px 16px',
                        borderRadius: '6px',
                        background: '#e8f5e9',
                        transition: 'background 0.2s',
                        border: '1px solid #c8e6c9'
                    }}>Kings Seeds Direct</a>
                    <a href="https://www.rhsplants.co.uk/" style={{
                        color: '#1976d2',
                        fontWeight: 'bold',
                        textDecoration: 'none',
                        padding: '8px 16px',
                        borderRadius: '6px',
                        background: '#e3f2fd',
                        transition: 'background 0.2s',
                        border: '1px solid #90caf9'
                    }}>RHS Plants</a>
                    <a href="https://www.thegarlicfarm.co.uk/pages/how-to-grow-garlic" style={{
                        color: '#6d4c41',
                        fontWeight: 'bold',
                        textDecoration: 'none',
                        padding: '8px 16px',
                        borderRadius: '6px',
                        background: '#fff3e0',
                        transition: 'background 0.2s',
                        border: '1px solid #ffe0b2'
                    }}>The Garlic Farm</a>
                    <a href="https://www.thompson-morgan.com/" style={{
                        color: '#c62828',
                        fontWeight: 'bold',
                        textDecoration: 'none',
                        padding: '8px 16px',
                        borderRadius: '6px',
                        background: '#ffebee',
                        transition: 'background 0.2s',
                        border: '1px solid #ffcdd2'
                    }}>Thompson & Morgan</a>
                    <a href="https://www.reddragonseeds.co.uk/" style={{
                        color: '#ad1457',
                        fontWeight: 'bold',
                        textDecoration: 'none',
                        padding: '8px 16px',
                        borderRadius: '6px',
                        background: '#fce4ec',
                        transition: 'background 0.2s',
                        border: '1px solid #f8bbd0'
                    }}>Red Dragon Seeds</a>
                </div>
            </div>
        {showModal && selectedContainer && (
            <div style={{
                position: 'fixed',
                top: 0,
                left: 0,
                width: '100vw',
                height: '100vh',
                background: 'rgba(0,0,0,0.4)',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                zIndex: 9999,
            }}
                onClick={closeModal}
            >
                <div style={{
                    background: '#fff',
                    borderRadius: '12px',
                    padding: '32px',
                    minWidth: '320px',
                    maxWidth: '90vw',
                    boxShadow: '0 2px 16px rgba(0,0,0,0.15)',
                    position: 'relative',
                }}
                    onClick={e => e.stopPropagation()}
                >
                    <button style={{ position: 'absolute', top: 12, right: 12, fontSize: '1.2rem', background: 'none', border: 'none', cursor: 'pointer' }} onClick={closeModal}>&times;</button>
                    <h2 style={{ marginBottom: '12px' }}>{selectedContainer.name}</h2>
                    <div><strong>Type:</strong> {
                        selectedContainer.type === 'planter_box' ? 'Planter Box'
                        : selectedContainer.type === 'strawberry_box' ? 'Strawberry Box'
                        : selectedContainer.type === 'pot' ? 'Pot'
                        : selectedContainer.type
                    }</div>
                    <div><strong>Location:</strong> {selectedContainer.location}</div>
                    {selectedContainer.status && <div><strong>Status:</strong> {selectedContainer.status}</div>}
                    {selectedContainer.plant && <div><strong>Plant:</strong> {selectedContainer.plant.name}</div>}
                    {selectedContainer.varieties && selectedContainer.varieties.length > 0 && (
                        <div style={{ marginTop: '12px' }}>
                            <strong>Varieties:</strong>
                            <ul>
                                {selectedContainer.varieties.map(v => (
                                    <li key={v.id}>{v.name}</li>
                                ))}
                            </ul>
                        </div>
                    )}
                    {/* Notes split into plant and variety sections */}
                    {/* Plant notes section - fallback to global plants array if notes missing */}
                    {(() => {
                        if (!selectedContainer.plant) return null;
                        let plantNotes = Array.isArray(selectedContainer.plant.notes) ? selectedContainer.plant.notes : [];
                        // Fallback: find plant in global plants array if notes missing or empty
                        if (plantNotes.length === 0) {
                            const found = plants.find(p => p.id === selectedContainer.plant.id);
                            if (found && Array.isArray(found.notes) && found.notes.length > 0) {
                                plantNotes = found.notes;
                            }
                        }
                        // Only show notes that do NOT have a variety_id
                        const filteredNotes = plantNotes.filter(noteObj => !noteObj.variety_id);
                        if (filteredNotes.length > 0) {
                            return (
                                <div style={{ marginTop: '18px', maxHeight: '220px', overflowY: 'auto' }}>
                                    <strong>Plant Notes:</strong>
                                    <ul>
                                        {filteredNotes.map(noteObj => (
                                            <li key={noteObj.id} style={{ fontStyle: 'italic', color: '#555' }}>
                                                {noteObj.url ? (
                                                    <a href={noteObj.url} target="_blank" rel="noopener noreferrer" style={{ color: '#1976d2', textDecoration: 'underline' }}>{noteObj.note}</a>
                                                ) : (
                                                    noteObj.note
                                                )}
                                            </li>
                                        ))}
                                    </ul>
                                </div>
                            );
                        }
                        return null;
                    })()}
                    {/* Variety notes section, one section per variety */}
                    {selectedContainer.varieties && selectedContainer.varieties.length > 0 && (
                        <div style={{ marginTop: '18px', maxHeight: '220px', overflowY: 'auto' }}>
                            <strong>Variety Notes:</strong>
                            {selectedContainer.varieties.filter(v => v.notes && v.notes.length > 0).map(v => (
                                <div key={v.id} style={{ marginBottom: '10px' }}>
                                    <span style={{ fontWeight: 'bold', color: '#1976d2' }}>{v.name}:</span>
                                    <ul style={{ marginLeft: '16px' }}>
                                        {v.notes.map(noteObj => (
                                            <li key={noteObj.id} style={{ fontStyle: 'italic', color: '#555' }}>
                                                {noteObj.url ? (
                                                    <a href={noteObj.url} target="_blank" rel="noopener noreferrer" style={{ color: '#1976d2', textDecoration: 'underline' }}>{noteObj.note}</a>
                                                ) : (
                                                    noteObj.note
                                                )}
                                            </li>
                                        ))}
                                    </ul>
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            </div>
        )}
    </React.Fragment>
    );
}

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />);
